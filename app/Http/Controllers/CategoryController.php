<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catergories = Category::all();
        return view('categories.index', ['catergories' => $catergories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catergories = Category::all();
        return view('back.layout.forms.categories', ['catergories' => $catergories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'nullable',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_image');
        }

        try {
            Category::create([
                'image' => $imagePath,
                'name' => $request->name,
                'description' => $request->description
            ]);
            return to_route('categories.index')->with('status', 'category added successfully');
        } catch (Exception $g) {
            return to_route('categories.index')->with('status', $g->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $catergories = Category::all();
        return view('categories.edit', ['catergories' => $catergories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'nullable',
        ]);
        try {
            $category->update($request->except('_token'));
            if ($category->image && $request->file('image')) {
                Storage::delete($category->image);
                $category->image = Storage::put('product_image', $request->file('image'));
            } else if ($request->file('image')) {
                $category->image = Storage::put('product_image', $request->file('image'));
            }
            return to_route('categories.index')->with('status', 'category updated successfully');
        } catch (Exception $e) {
            return to_route('categories.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            if ($category->image) Storage::delete($category->image);
            $category->delete();
            return to_route('categories.index')->with('status', 'category deleted successfully');
        } catch (Exception $e) {
            return to_route('categories.index')->with('status', $e->getMessage());
        }
    }
}
