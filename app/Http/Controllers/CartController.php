<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }
    public function delete(Cart $cart)
    {
        session()->forget('added_to_cart.' . $cart->product_id);
        $cart->delete();
        return redirect()->route('front.cart')->with('success', 'Product removed from cart');
    }

    public function addproducttocart($productid)
    {
        $customer_id = Auth::guard('customer')->user()->id;

        $cart = Cart::where('customer_id', $customer_id)->where('product_id', $productid)->first();

        if ($cart) {
            $cart->quntaity += 1;
            $cart->save();
        } else {
            $newcart = new cart();
            $newcart->product_id = $productid;
            $newcart->customer_id = $customer_id;
            $newcart->quntaity = 1;
            $newcart->save();
        }

        $cartproducts = Cart::where('customer_id', $customer_id)->with('product')->get();
        return view('front.cart', ['cartproducts' => $cartproducts]);
    }



    public function show()
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $cartproducts = Cart::where('customer_id', $customer_id)->get();

        return view('front.cart', ['cartproducts' => $cartproducts]);
    }

    public function checkout()
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $cartproducts = Cart::where('customer_id', $customer_id)->get();
        return view('front.checkout', ['cartproducts' => $cartproducts]);
    }

    public function storeorder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
        ]);

        $customer_id = Auth::guard('customer')->user()->id;

        $neworder = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'customer_id' => $customer_id,
        ]);

        $cartproducts = Cart::where('customer_id', $customer_id)->get();
        foreach ($cartproducts as $item) {
            Orderdetails::create([
                'price' => $item->product->price,
                'product_id' => $item->product_id,
                'quntaity' => $item->quntaity,
                'order_id' => $neworder->id,
            ]);
        }

        Cart::where('customer_id', $customer_id)->delete();

        return redirect()->route('index')->with('success', 'Order placed successfully.');
    }

    public function previousorder() {
        $customer_id = Auth::guard('customer')->user()->id;
        $orders = Order::where('customer_id', $customer_id)->with('orderdetails')->get();
        return view('front.previousorder', ['orders' => $orders]);
    }










    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'quntaity' => 'required|integer|min:1'
        ]);

        $cart = Cart::find($request->cart_id);

        if ($cart) {
            $cart->quntaity = $request->quntaity; // تأكد من تطابق الاسم
            $cart->save();

            $total = $cart->product->price * $cart->quntaity;

            $cartTotal = Cart::where('customer_id', $cart->customer_id)
                ->with('product')
                ->get()
                ->sum(function ($item) {
                    return $item->product->price * $item->quntaity; // تأكد من تطابق الاسم
                });

            return response()->json([
                'rowTotal' => $total,
                'cartTotal' => $cartTotal
            ]);
        }

        return response()->json(['error' => 'Order not found'], 404);
    }
}
