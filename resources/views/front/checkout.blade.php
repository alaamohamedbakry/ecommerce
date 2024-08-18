@extends('layouts.master')
@section('content')

    <head>
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

            .small-button {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
                /* حجم النص أصغر */
                margin-left: auto;
                /* تحريك الزر إلى اليمين */
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
            <p class="font-medium text-gray-600">Checkout</p>
        </div>
        <!-- ./breadcrumb -->

        <!-- wrapper -->
        <div class="container grid items-start grid-cols-12 gap-6 pt-4 pb-16">

            <div class="col-span-8 p-4 border border-gray-200 rounded">
                <h3 class="mb-4 text-lg font-medium capitalize">Checkout</h3>
                <div class="space-y-4">
                    <form action="{{ route('storeorder') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="text-gray-600">Name <span class="text-primary">*</span></label>
                            <input type="text" name="name" id="name" class="input-box">
                        </div>
                        <div>
                            <label for="address" class="text-gray-600">Street address</label>
                            <input type="text" name="address" id="address" class="input-box">
                        </div>
                        <div>
                            <label for="city" class="text-gray-600">City</label>
                            <input type="text" name="city" id="city" class="input-box">
                        </div>
                        <div>
                            <label for="phone" class="text-gray-600">Phone number</label>
                            <input type="text" name="phone" id="phone" class="input-box">
                        </div>
                        <div>
                            <label for="email" class="text-gray-600">Email address</label>
                            <input type="email" name="email" id="email" class="input-box">
                        </div>

                        <div class="flex mt-2 justify-content-end ">
                            <button type="submit" class= "add-to-cart-btn small-button">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-4 p-4 border border-gray-200 rounded">
                <h4 class="mb-4 text-lg font-medium text-gray-800 uppercase">order summary</h4>
                @foreach ($cartproducts as $cartproduct)
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <div>
                                <h5 class="font-medium text-gray-800"> {{ $cartproduct->product->name }}</h5>
                            </div>
                            <p class="text-gray-600">
                                x {{ $cartproduct->quntaity }}
                            </p>
                            <p class="font-medium text-gray-800"> {{ $cartproduct->product->price }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between py-3 mt-1 font-medium text-gray-800 border-b border-gray-200 uppercas">
                        <p>subtotal</p>
                        <p class="total"data-price="{{ $cartproduct->product->price }}">
                            {{ $cartproduct->product->price * $cartproduct->quntaity }}</p>
                    </div>


                    <div class="flex justify-between py-3 font-medium text-gray-800 uppercas">
                        <p class="font-semibold">Total</p>
                        <p id="totalprice">
                            {{ $cartproducts->sum(function ($cartproduct) {
                                return $cartproduct->product->price * $cartproduct->quntaity;
                            }) }}
                        </p>
                    </div>
                @endforeach

            </div>


        </div>
        <!-- ./wrapper -->
    </body>
@endsection
