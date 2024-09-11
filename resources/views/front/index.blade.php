@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
</head>

<style>


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

<body>
    @if (session('success'))
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
            style="background-image: url({{ asset('front/assets/images/24-248789_ecommerce-website-development-e-commerce-banner-design-png.png') }});">
            <div class="container">
                <h1 class="mb-4 text-6xl font-medium text-gray-800 capitalize">
                    best collection for <br> your clothing
                </h1>
                <p>E-commerce has revolutionized the way businesses operate and interact with customers. <br>
                    By leveraging digital technologies and innovative strategies, companies can create seamless and
                    engaging shopping experiences, drive sales growth, and build lasting relationships with their
                    customers.</p>
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
            <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase">top new products </h2>
            <div class="slider">
                @foreach ($products as $product)
                <div class="overflow-hidden bg-white rounded shadow slider-item group">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full"
                             style="width: 200px; height: 150px;">
                        <div class="absolute inset-0 flex items-center justify-center gap-2 transition bg-black opacity-0 bg-opacity-40 group-hover:opacity-100">
                            <a href="{{ route('singleproduct', $product->id) }}"
                               class="flex items-center justify-center h-8 text-lg text-white transition rounded-full w-9 bg-primary hover:bg-gray-800"
                               title="عرض المنتج">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <div class="px-4 pt-4 pb-3">
                        <a href="{{ route('singleproduct', $product->id) }}">
                            <h4 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                                {{ $product->name }}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl font-semibold text-primary">${{ $product->price }}</p>
                            <p class="text-sm text-gray-400 line-through">${{ $product->original_price }}</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <span><i class="fa-solid fa-star"></i></span>
                                @endfor
                            </div>
                            <div class="ml-3 text-xs text-gray-500">(150)</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('addproducttocart', $product->id) }}">
                        @csrf
                        <button type="submit" class="add-to-cart-btn"> add to cart</button>
                    </form>
                </div>

                @endforeach

            </div>
            <div style="background-color: #f0f0f0; padding: 10px;">
                <button class="slider-prev" style="font-size: 24px; padding: 10px 20px; width: 50px; height: 50px;">&lt;</button>
                <button class="slider-next" style="font-size: 24px; padding: 10px 20px; width: 50px; height: 50px;">&gt;</button>
            </div>

        </div>
        <!-- ./new arrival  -->
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: '.slider-prev',
                nextArrow: '.slider-next',
                infinite: true, // Enable infinite looping
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>

@endsection
