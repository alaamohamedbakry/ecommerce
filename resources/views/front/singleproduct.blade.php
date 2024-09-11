@extends('layouts.master')

@section('content')
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

        /* Slider Styles */

        .slider {
        position: relative;
        width: 100%;
        max-width: 400px;
        margin: auto;
        overflow: hidden;
        border-radius: 8px;
    }

    .slider figure {
        display: flex;
        margin: 0;
        transition: transform 0.2s ease-in-out;
    }

    .slider figure img {
        width: 100%;
        height: auto;
        flex-shrink: 0; /* Ensure images do not shrink */
    }

    .slider .prev, .slider .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .slider .prev {
        left: 10px;
    }

    .slider .next {
        right: 10px;
    }
    </style>
</head>

<body>
    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div class="slider">
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
            <figure>
                @foreach ($product->productphoto as $item)
                    <img src="{{ asset('storage/'.$item->photopath) }}" alt="Product Image">
                @endforeach
            </figure>
        </div>
        <div>
            <h2 class="mb-2 text-3xl font-medium uppercase">{{ $product->name }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                </div>
                <div class="ml-3 text-xs text-gray-500">(150 Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="space-x-2">
                    <span class="font-semibold text-gray-800">Category: </span>
                    <span class="text-gray-600">{{ $product->category->name }}</span>
                </p>
                <p class="space-x-2">
                    <span class="font-semibold text-gray-800">SKU: </span>
                    <span class="text-gray-600">BE45VGRT</span>
                </p>
            </div>
            <div class="flex items-baseline mt-4 mb-1 space-x-2 font-roboto">
                <p class="text-xl font-semibold text-primary">{{ $product->price }}</p>
            </div>
            <p class="mt-4 text-gray-600">{{ $product->description }}</p>
        </div>
        <div class="mt-4">
            <h4 class="mb-2 text-2xl font-medium">Quantity:</h4>
            <input type="number" value="{{ $product->quntaity }}" class="quantity" disabled>
        </div>
        <div class="flex gap-3 pt-5 pb-5 mt-6 border-b border-gray-200">
            <form method="POST" action="{{ route('addproducttocart', $product->id) }}">
                @csrf
                <button type="submit" class="add-to-cart-btn">Add to cart</button>
            </form>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16">
        <h3 class="pb-3 font-medium text-gray-800 border-b border-gray-200 font-roboto">Product details</h3>
        <div class="w-3/5 pt-6">
            <div class="text-gray-600">
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>
    <!-- ./description -->
    <!-- qr code-->
    <div class="container pb-16">
    <h3>Scan this QR Code to view this product:</h3>
    <div>
        {!! $qrcode !!}
    </div>
    </div>
      <!-- ./qr code-->


        <!-- related product -->
        <div class="container pb-16">
            <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase">Related products</h2>
            <div class="grid grid-cols-4 gap-6">
                @foreach ($relatedproducts as $related)
                    <div class="overflow-hidden bg-white rounded shadow group">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $related->image) }}" alt="product 1" class="w-full"
                                style="width: 200px; height: 150px;">
                            <div
                                class="absolute inset-0 flex items-center justify-center gap-2 transition bg-black opacity-0 bg-opacity-40 group-hover:opacity-100">
                                <a href="{{ route('singleproduct', $related->id) }}"
                                    class="flex items-center justify-center h-8 text-lg text-white transition rounded-full w-9 bg-primary hover:bg-gray-800"
                                    title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </div>
                        </div>
                        <div class="px-4 pt-4 pb-3">
                            <a href="{{ route('singleproduct', $related->id) }}">
                                <h4 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                                    {{ $related->name }}</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl font-semibold text-primary">${{ $related->price }}</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="ml-3 text-xs text-gray-500">(150)</div>
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
    </body>
@endsection







<script>
    let currentIndex = 0;

    function moveSlide(direction) {
        const slides = document.querySelectorAll('.slider figure img');
        const totalSlides = slides.length;

        currentIndex += direction;

        if (currentIndex >= totalSlides) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = totalSlides - 1;
        }

        const newTransform = -currentIndex * 100 + '%';
        document.querySelector('.slider figure').style.transform = `translateX(${newTransform})`;
    }

    document.querySelector('.prev').addEventListener('click', () => moveSlide(-1));
    document.querySelector('.next').addEventListener('click', () => moveSlide(1));
</script>
