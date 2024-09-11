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
        .add-to-cart-btn {
            display: block;
            width: 100%;
            padding: 8px;
            background-color: #f43f5e;
            color: white;
            text-align: center;
            border: none;
            border-radius: 0 0 8px 8px;
            cursor: pointer;
        }
        .add-to-cart-btn:hover {
            background-color: white;
            color: #f43f5e;
            border: 1px solid #f43f5e;
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
            </div>
            <div class="px-4 pt-4 pb-3">
                <a href="{{ route('singleproduct',$product->id) }}">
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
            <form method="POST" action="{{ route('addproducttocart', $product->id) }}">
                @csrf
                <button type="submit" class="add-to-cart-btn">Add to cart</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
<!-- ./related product -->
</html>
@endsection
