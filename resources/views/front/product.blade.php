@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .product-image {
            width: 100%;
            height: 350px; /* يمكنك تعديل هذا حسب الاحتياج */
            object-fit: cover; /* لضبط الصورة داخل الحاوية مع الحفاظ على الأبعاد */
        }
    </style>
</head>
<!-- breadcrumb -->
<div class="container flex items-center gap-3 py-4">
    <a href="index" class="text-base text-primary">
        <i class="fa-solid fa-house"></i>
    </a>
    <span class="text-sm text-gray-400">
        <i class="fa-solid fa-chevron-right"></i>
    </span>
    <p class="font-medium text-gray-600">Product</p>
</div>
<!-- ./breadcrumb -->

<!-- related product -->
<div class="container pb-16">
    <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase">Related products</h2>
    <div class="grid grid-cols-4 gap-6">
        @foreach ($products as $product)
        <div class="overflow-hidden bg-white rounded shadow group">
            <div class="relative">
                <img src="{{asset('storage/'. $product->image)}}" alt="product 1" class="product-image">
                <div
                    class="absolute inset-0 flex items-center justify-center gap-2 transition bg-black opacity-0 bg-opacity-40 group-hover:opacity-100">
                    <a href="#"
                        class="flex items-center justify-center h-8 text-lg text-white transition rounded-full w-9 bg-primary hover:bg-gray-800"
                        title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                        class="flex items-center justify-center h-8 text-lg text-white transition rounded-full w-9 bg-primary hover:bg-gray-800"
                        title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="px-4 pt-4 pb-3">
                <a href="#">
                    <h4 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                        {{ $product->name }}</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <h3 class="mb-3 text-xl font-medium text-gray-800 uppercase">price:</h3>
                    <p class="text-xl font-semibold text-primary">{{ $product->price }}</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="ml-3 text-xs text-gray-500"> Quantity:{{ $product->quntaity }}</div>
                </div>
            </div>
            <a href="#"
                class="block w-full py-1 text-center text-white transition border rounded-b bg-primary border-primary hover:bg-transparent hover:text-primary">Add
                to cart</a>
        </div>
        @endforeach
    </div>
</div>
<!-- ./related product -->
</html>
@endsection
