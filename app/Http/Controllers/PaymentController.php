<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function session(Request $request)
    {
        // تعيين مفتاح API الخاص بـ Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // التحقق من تسجيل دخول العميل
         $customer = Auth::guard('customer')->user();
        if (!$customer) {
            return redirect()->route('customer_login');
        }

        // جلب المنتجات من الطلب
        $productIds = $request->product_ids;

        // تجميع المنتجات حسب 'product_id' وجمع الكميات
        $cartproducts = Cart::whereIn('product_id', $productIds)
            ->selectRaw('product_id, SUM(quntaity) as total_quantity')
            ->groupBy('product_id')
            ->get();

         // إنشاء عميل Stripe
        $stripeCustomer = \Stripe\Customer::create([
            'email' => $customer->email,
            'name' => $customer->name,
            'phone' => $customer->phone,
        ]);

        $lineItems = [];
        foreach ($cartproducts as $cartproduct) {

            // جلب معلومات المنتج من العلاقة
            $product = $cartproduct->product;

            // حساب السعر للوحدة (بالقروش)
            $unit_amount = $cartproduct->product->price *100;// تحويل السعر إلى "قرش"

            // تجميع العناصر لكل منتج
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'egp', // العملة
                    'product_data' => [
                        'name' => $product->name, // اسم المنتج
                    ],
                    'unit_amount' => $unit_amount, // السعر لكل وحدة
                ],
                'quantity' => $cartproduct->total_quantity, // الكمية المجمعة
            ];
        }

        // إنشاء جلسة Stripe
        try {
            $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'customer' => $stripeCustomer->id,
                'success_url' => route('payment.callback'),
                'cancel_url' => route('payment.error'),
            ]);

            return response()->json($checkout_session->id);
        } catch (\Exception $e) {
            // التعامل مع الأخطاء المحتملة
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // صفحة النجاح
    public function callback()
    {
        return view('payment.success');
    }

    // صفحة الخطأ
    public function error()
    {
        return view('payment.error');
    }
}


