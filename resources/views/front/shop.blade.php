@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .product-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-info {
            padding: 16px;
            text-align: center;
        }
        .product-info h4 {
            font-size: 1.25rem;
            margin-bottom: 8px;
        }
        .product-info p {
            margin: 4px 0;
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
<body>
    <!-- breadcrumb -->
    <div class="container flex items-center gap-3 py-4">
        <a href="../index.html" class="text-base text-primary">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="font-medium text-gray-600">Shop</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- shop wrapper -->
    <div class="container grid items-start grid-cols-1 gap-6 pt-4 pb-16 md:grid-cols-3">
        <!-- products -->
        <div class="col-span-3">
            <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
                @foreach ($products as $product)
                    <div class="overflow-hidden bg-white rounded shadow product-card group">
                        <div class="relative">
                            <img src="{{asset('storage/'. $product->image)}}" alt="product image" class="product-image">
                        </div>
                        <div class="product-info">
                            <a href="{{ route('singleproduct',$product->id) }}">
                                <h4 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                                    {{ $product->name }}
                                </h4>
                            </a>
                            <div class="flex items-baseline justify-center mb-1 space-x-2">
                                <p class="text-xl font-semibold text-primary">price: ${{ $product->price }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('addproducttocart', $product->id) }}">
                            @csrf
                            <button type="submit" class="add-to-cart-btn">Add to cart</button>
                        </form>
                    </div>
                @endforeach

                {{ $products->links() }}
            </div>
        </div>
    </div>
</body>
</html>
@endsection
