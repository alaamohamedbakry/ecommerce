<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Socialnetwork;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at')->get();
        return view('front.index', [
            'catergories' => $categories,
            'products' => $products
        ]);
    }
    public function product($catid = null)
    {
        if ($catid) {
            $product = Product::where('catergories_id', $catid)->get();
            return view('front.product', ['products' => $product]);
        } else {
            $product = Product::all();
            return view('front.shop', ['products' => $product]);
        }
    }
    public function shop()
    {
        $category = Category::all();
        $product = Product::paginate(6);
        return view('front.shop', ['products' => $product, 'category' => $category]);
    }
    public function review()
    {
        $reviews = Review::orderby('created_at')->paginate(3);
        return view('front.review', ['reviews' => $reviews]);
    }
    public function storereview(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|numeric',
            'message' => 'required',
            'subject' => 'required',
            'email' => 'required'
        ]);
        $newreview = new Review();
        $newreview->name = $request->name;
        $newreview->phone = $request->phone;
        $newreview->email = $request->email;
        $newreview->subject = $request->subject;
        $newreview->message = $request->message;

        $newreview->save();
        return redirect('review');
    }

    public function showproduct($productid)
    {
        $product = Product::with('productphoto')->find($productid);
        $priceRange = 0.20;
        $minPrice = $product->price * (1 - $priceRange);
        $maxPrice = $product->price * (1 + $priceRange);
        $relatedproducts = Product::where('catergories_id', $product->catergories_id)
            ->where('id', '!=', $productid)
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('front.singleproduct', ['product' => $product,'relatedproducts'=>$relatedproducts]);
    }


    public function show(){
        $socialNetworks = Socialnetwork::first(); 
    return view('front.contact',compact('socialNetworks'));
    }
    
    public function about_us(){
      
    return view('front.about-us');
    }
    
















}
