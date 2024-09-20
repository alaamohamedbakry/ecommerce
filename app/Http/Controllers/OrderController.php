<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Customer as CustomerMiddleware;
use App\Models\Orderdetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{


    public function createPayment($orderId)
    {
        // الحصول على الطلب من قاعدة البيانات
        $order = Order::with('customer')->findOrFail($orderId);

        // إعداد بيانات الدفع
        $data = [
            'InvoiceAmount'   => $order->total_amount, // المبلغ الإجمالي للطلب
            'CustomerEmail'   => $order->customer->email,
            'CustomerName'    => $order->customer->name,
            'CallBackUrl'     => route('payment.callback'), // رابط العودة بعد الدفع
            'ErrorUrl'        => route('payment.error'),    // رابط في حالة وجود خطأ
        ];

        // إرسال الطلب إلى MyFatoorah
        $response = Http::withHeaders([
            'authorization' => 'Bearer ' . env('MYFATOORAH_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post(env('MYFATOORAH_API_URL'), $data);

        // معالجة الرد
        $responseBody = $response->json();

        if ($response->successful() && isset($responseBody['Data']['InvoiceURL'])) {
            // إعادة توجيه العميل إلى رابط الدفع
            return redirect($responseBody['Data']['InvoiceURL']);
        } else {
            // في حالة وجود خطأ
            return back()->with('error', 'حدث خطأ أثناء إنشاء الدفع');
        }
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $product = Product::all();
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders, 'products' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $order = Order::with('orderdetails')->findOrFail($id);
        return view('orders.show', compact('order'));
    }



    public function create(Request $request)
    {
        $customers = Customer::all();
        return view('back.layout.forms.order', compact('customers'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'customer_id' => 'required|numeric|exists:customers,id'
        ]);
        try {
          $order=  order::create($request->except('_token'));
            return $this->createPayment($order->id);

            return to_route('orders.index')->with('status', 'NEW ORDER ADDED');
        } catch (Exception $a) {
            return to_route('orders.index')->with('status', $a->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'customer_id' => 'required|numeric|exists:customers,id'
        ]);
        try {
            $order->update($request->except('_token'));
            return to_route('orders.index')->with('status', 'NEW ORDER UPDATED');
        } catch (Exception $a) {
            return to_route('orders.index')->with('status', $a->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return to_route('orders.index')->with('status', 'NEW ORDER DELETED');
        } catch (Exception $a) {
            return to_route('orders.index')->with('status', $a->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $detail = Orderdetails::findOrFail($id);
            $orderId = $detail->order_id;
            $detail->delete();

            return redirect()->route('orders.show', $orderId)->with('status', 'Detail deleted successfully!');

        } catch (Exception $e) {
            return redirect()->route('orders.index')->with('status', 'Error: ' . $e->getMessage());
        }
    }


    public function totalorders(){
        $totalorder= Order::count();
        return response()->json(['total'=>$totalorder]);
    }
    public function getEarnings()
    {

            $totalEarnings = Orderdetails::selectRaw('SUM(price * quntaity) as  total_earnings')
            ->value('total_earnings');

            return response()->json(['totalEarnings'=>$totalEarnings]);

    }
    public function chartearnings(){
        try {
            $data = Orderdetails::selectRaw('MONTH(created_at) as month, SUM(price * quntaity) as total_earnings')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
}
