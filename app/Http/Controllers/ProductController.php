<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Exception;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import the Str class
use Stringable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('products.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catergories = Category::all();
        return view('back.layout.forms.products', compact('catergories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'string|nullable',
            'quntaity' => 'required|numeric|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'catergories_id' => 'required|numeric|exists:catergories,id'
        ]);

        try {

            Product::create([
                'image' => $request->file('image')->store('product_image', 'public'),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'quntaity' => $request->quntaity,
                'catergories_id' => $request->catergories_id
            ]);
            return to_route('products.index')->with('status', 'Product added successfully.');
        } catch (Exception $e) {
            return to_route('products.index')->with('status', $e->getMessage());
        }
    }

    public function show($id)
    {
        $product = product::findorfail($id);
        return view('products.show', ['product' => $product]);
    }
    public function edit(Product $product)
    {
        $catergories = Category::all();
        return view('products.edit', compact('product'), compact('catergories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'string',
            'quntaity' => 'required|numeric|min:1',
            'image' => 'image',
            'catergories_id' => 'required|numeric|exists:catergories,id'
        ]);
        try {
            $product->update($request->except('_token'));
            if ($product->image && $request->file('image')) {
                Storage::delete($product->image);
                $product->image = Storage::put('product_image', $request->file('image'));
            } elseif ($request->file('image')) {
                $product->image = storage::put('product_image', $request->file('image'));
            }
            return to_route('products.index')->with('status', 'product updated');
        } catch (Exception $a) {
            return to_route('products.index')->with('status', $a->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->image) Storage::delete($product->image);
            $product->delete();
            return to_route('products.index')->with('status', 'product deleted');
        } catch (Exception $a) {
            return to_route('products.index')->with('status', $a->getMessage());
        }
    }



    public function addproductimages(Request $request, $productid)
{
    $product = Product::findOrFail($productid);

    // حفظ الصور
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $productPhoto) {
            $photopath = $productPhoto->store('product_image', 'public');
            ProductPhoto::create([
                'product_id' => $product->id,
                'photopath' => $photopath,
            ]);
        }
    }

    $productimages = ProductPhoto::where('product_id', $product->id)->get();

    return view('products.addproductimage', [
        'productimages' => $productimages,
        'product' => $product
    ]);
}

    public function removeproductphotos(ProductPhoto $productPhoto)
{
    try {
        if ($productPhoto->photopath) Storage::delete($productPhoto->photopath);
        $productPhoto->delete();
        return to_route('products.index')->with('status', 'productphoto deleted');
    } catch (Exception $a) {
        return to_route('products.index')->with('status', $a->getMessage());
    }
}

public function storeproductimage(Request $request)
{
    $request->validate([
        'image' => 'required|image',
        'product_id' => 'required|numeric|exists:products,id'
    ]);

    try {
        $photopath = $request->file('image')->store('product_image', 'public');

        ProductPhoto::create([
            'photopath' => $photopath,
            'product_id' => $request->product_id
        ]);

        // بعد حفظ الصورة بنجاح، نعيد التوجيه إلى الصفحة المناسبة
        return redirect()->route('addproductimage', ['productid' => $request->product_id])
                         ->with('status', 'Product added successfully.');
    } catch (Exception $e) {
        return redirect()->route('addproductimage', ['productid' => $request->product_id])
                         ->with('status', $e->getMessage());
    }
}

public function totalproducts(){
    $totalproducts= Product::count();
    return response()->json(['total'=>$totalproducts]);
}

public function getchart(){
    $data= Product::select('name','quntaity')->get();

    return response()->json($data);
}

}


