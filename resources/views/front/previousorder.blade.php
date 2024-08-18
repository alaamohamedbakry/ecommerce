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
                margin-left: auto;
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
            <p class="font-medium text-gray-600">Previous Orders</p>
        </div>
        <!-- ./breadcrumb -->

        <!-- wrapper -->
        <div class="container grid items-start grid-cols-12 gap-6 pt-4 pb-16">
            <div class="col-span-8 p-4 border border-gray-200 rounded">
                @foreach ($orders as $order)
                    <div class="mb-6">
                        <h3 class="mb-4 text-lg font-medium capitalize">Order number: {{ $order->id }}</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="created_at" class="text-gray-600">Created at</label>
                                <input type="created_at" name="created_at" id="created_at" value="{{ $order->created_at }}"
                                    class="input-box" disabled>
                            </div>
                            <div>
                                <label for="name" class="text-gray-600">Name</label>
                                <input type="text" name="name" id="name" value="{{ $order->name }}"
                                    class="input-box" disabled>
                            </div>
                            <div>
                                <label for="address" class="text-gray-600">Street address</label>
                                <input type="text" name="address" id="address" value="{{ $order->address }}"
                                    class="input-box" disabled>
                            </div>
                            <div>
                                <label for="city" class="text-gray-600">City</label>
                                <input type="text" name="city" id="city" value="{{ $order->city }}"
                                    class="input-box" disabled>
                            </div>
                            <div>
                                <label for="phone" class="text-gray-600">Phone number</label>
                                <input type="text" name="phone" id="phone" value="{{ $order->phone }}"
                                    class="input-box" disabled>
                            </div>
                            <div>
                                <label for="email" class="text-gray-600">Email address</label>
                                <input type="email" name="email" id="email" value="{{ $order->email }}"
                                    class="input-box" disabled>
                            </div>

                            <div class="col-span-4 p-4 border border-gray-200 rounded mt-4">
                                <h4 class="mb-4 text-lg font-medium text-gray-800 uppercase">Order Details</h4>
                                @foreach ($order->orderDetails as $detail)
                                    <div class="space-y-2 mb-4">
                                        <div class="flex justify-between">
                                            <div>
                                                <h5 class="font-medium text-gray-800">{{ $detail->product->name }}</h5>
                                            </div>
                                            <p class="text-gray-600">x {{ $detail->quntaity }}</p>
                                            <p class="font-medium text-gray-800">
                                                {{ number_format($detail->product->price, 2) }}</p>
                                        </div>
                                        <div
                                            class="flex justify-between py-3 mt-1 font-medium text-gray-800 border-b border-gray-200 uppercase">
                                            <p>Subtotal</p>
                                            <p>{{ number_format($detail->product->price * $detail->quntaity, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <div
                                    class="flex justify-between py-3 mt-1 font-medium text-gray-800 border-t border-gray-200 uppercase">
                                    <p class="font-semibold">Total</p>
                                    <p id="orderTotal">
                                        {{ number_format(
                                            $order->orderDetails->sum(function ($detail) {
                                                return $detail->product->price * $detail->quntaity;
                                            }),
                                            2,
                                        ) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- ./wrapper -->
    </body>
@endsection
