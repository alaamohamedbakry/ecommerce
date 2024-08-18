@extends('layouts.master')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

</head>
    <style>
        .slider {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider-item {
            min-width: 25%;
            /* Adjust as needed for the number of items to show */
            margin-right: 16px;
        }

        .slider-prev,
        .slider-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
        }

        .slider-prev {
            left: 10px;
        }

        .slider-next {
            right: 10px;
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
        .modal.show {
        display: block;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1050;
        overflow: hidden;
        outline: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
        position: relative;
    }
    
    .modal-content {
        position: relative;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3rem;
        box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1rem;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 0.3rem;
        border-top-right-radius: 0.3rem;
    }
    
    .modal-title {
        margin-bottom: 0;
        line-height: 1.5;
    }
    
    .close {
        padding: 1rem;
        margin: -1rem -1rem -1rem auto;
    }
    
    .modal-body {
        position: relative;
        padding: 1rem;
    }
    
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        padding: 1rem;
        border-top: 1px solid #dee2e6;
    }
    
    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    
    .btn-danger:hover {
        color: #fff;
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
    </style>

    <body>
        @if(session('success'))
        <div class="modal show" id="myModal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>{{ session('success') }}</p>
                    </div>
              
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="closeModalBtn">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    
        <div>
            <!-- banner -->
            <div class="bg-center bg-no-repeat bg-cover py-36"
                style="background-image: url({{ asset('front/assets/images/OIP.jpg') }});">
                <div class="container">
                    <h1 class="mb-4 text-6xl font-medium text-gray-800 capitalize">
                        best collection for <br> your clothing
                    </h1>
                    <p>E-commerce has revolutionized the way businesses operate and interact with customers. <br>
                        By leveraging digital technologies and innovative strategies, companies can create seamless and engaging shopping experiences, drive sales growth, and build lasting relationships with their customers.</p>
                    <div class="mt-12">
                        <a href="{{ route('shop') }}"
                            class="px-8 py-3 font-medium text-white border rounded-md bg-primary border-primary hover:bg-transparent hover:text-primary">Shop
                            Now</a>
                    </div>
                </div>
            </div>
            <!-- ./banner -->

            <!-- features -->
            <div class="container py-16">
                <div class="grid justify-center w-10/12 grid-cols-1 gap-6 mx-auto md:grid-cols-3">
                    <div class="flex items-center justify-center gap-5 px-3 py-6 border rounded-sm border-primary">
                        <img src="{{ asset('front/assets/images/icons/delivery-van.svg') }}" alt="Delivery"
                            class="object-contain w-12 h-12">
                        <div>
                            <h4 class="text-lg font-medium capitalize">Free Shipping</h4>
                            <p class="text-sm text-gray-500">Order over $200</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-5 px-3 py-6 border rounded-sm border-primary">
                        <img src="{{ asset('front/assets/images/icons/money-back.svg') }}" alt="Delivery"
                            class="object-contain w-12 h-12">
                        <div>
                            <h4 class="text-lg font-medium capitalize">Money Returns</h4>
                            <p class="text-sm text-gray-500">30 days money returns</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-5 px-3 py-6 border rounded-sm border-primary">
                        <img src="{{ asset('front/assets/images/icons/service-hours.svg') }}" alt="Delivery"
                            class="object-contain w-12 h-12">
                        <div>
                            <h4 class="text-lg font-medium capitalize">24/7 Support</h4>
                            <p class="text-sm text-gray-500">Customer support</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./features -->

            <!-- categories -->
            <div class="container py-16">
                <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase">shop by category</h2>
                <div class="px-4 pt-4 pb-3">
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                        @foreach ($catergories as $category)
                            <div class="relative overflow-hidden rounded-sm group">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="category 1" class="w-full h-60">
                                <a href="{{ route('product', ['catid' => $category->id]) }}"
                                    class="absolute inset-0 flex items-center justify-center text-xl font-medium text-white transition bg-black bg-opacity-40 font-roboto group-hover:bg-opacity-60">{{ $category->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ./categories -->

            <!-- new arrival -->
            <div class="container pb-16">
                <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase">top new arrival</h2>
                <div class="slider">
                    <div class="slider-wrapper">
                        @foreach ($products as $product)
                            <div class="overflow-hidden bg-white rounded shadow slider-item group">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="product 1" class="w-full"
                                        style="width: 200px; height: 150px;">
                                    <div
                                        class="absolute inset-0 flex items-center justify-center gap-2 transition bg-black opacity-0 bg-opacity-40 group-hover:opacity-100">
                                        <a href="#"
                                            class="flex items-center justify-center h-8 text-lg text-white transition rounded-full w-9 bg-primary hover:bg-gray-800"
                                            title="view product">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="px-4 pt-4 pb-3">
                                    <a href="{{ route('singleproduct', $product->id) }}">
                                        <h4
                                            class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                                            {{ $product->name }}</h4>
                                    </a>
                                    <div class="flex items-baseline mb-1 space-x-2">
                                        <p class="text-xl font-semibold text-primary">${{ $product->price }}</p>
                                        <p class="text-sm text-gray-400 line-through">${{ $product->original_price }}</p>
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
                    <button class="slider-prev">&lt;</button>
                    <button class="slider-next">&gt;</button>
                </div>
            </div>


            <!-- ./new arrival -->

           
        </div>
    </body>
@endsection






<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<script>
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const slides = document.querySelectorAll('.slider-item');
    const totalSlides = slides.length;
    let currentIndex = 0;

    function updateSlider() {
        const offset = -currentIndex * (slides[0].offsetWidth + 16); // 16 is the margin-right of slider-item
        sliderWrapper.style.transform = `translateX(${offset}px)`;
    }

    document.querySelector('.slider-prev').addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalSlides - 1;
        updateSlider();
    });

    document.querySelector('.slider-next').addEventListener('click', () => {
        currentIndex = (currentIndex < totalSlides - 1) ? currentIndex + 1 : 0;
        updateSlider();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var closeModalButtons = document.querySelectorAll('#closeModalBtn');
        var modal = document.getElementById('myModal');

        closeModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                modal.style.display = 'none';
            });
        });
    });
</script>