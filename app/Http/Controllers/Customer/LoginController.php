<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $categories = Category::all();
        $products = Product::all();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('index')->with([
                'categories' => $categories,
                'products' => $products
            ]);
        } elseif (Auth::attempt($credentials)) {
            return redirect()->route('showdashboard');
        } else {
            return redirect()->route('customer_login')->with('error', 'Login unsuccessful');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('index')->with('success', 'Logout successfully');
    }
}
