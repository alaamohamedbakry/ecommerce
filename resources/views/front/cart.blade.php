@extends('layouts.master')

@section('content')
    <style>
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        .cart-table-head {
            background-color: #f8f8f8;
            text-align: left;
        }

        .table-head-row th {
            padding: 1rem;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
        }

        .table-body-row td {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        .product-image img {
            width: 50px;
            height: auto;
        }

        .product-name,
        .product-price,
        .product-quantity,
        .product-total {
            text-align: center;
        }

        .product-remove a {
            color: #ff0000;
        }

        .product-quantity input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            padding: 0.25rem;
        }

        .total-table {
            width: 100%;
            margin-top: 2rem;
            border-collapse: collapse;
        }

        .total-table-head th {
            padding: 1rem;
            font-weight: bold;
            background-color: #f8f8f8;
            border-bottom: 2px solid #ddd;
        }

        .total-data td {
            padding: 0.5rem;
            border-bottom: 1px solid #ddd;
        }

        .cart-buttons {
            margin-top: 1rem;
        }

        .cart-buttons a {
            display: inline-block;
            padding: 0.5rem 1rem;
            color: #fff;
            background-color: #ff6600;
            /* لون الزر لتحديث السلة */
            text-decoration: none;
            border-radius: 5px;
            margin-right: 0.5rem;
        }

        .cart-buttons .black {
            background-color: #333;
            /* لون الزر للدفع */
        }
        .alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 1rem;
    border-radius: .25rem;
}
    </style>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- سلة التسوق -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">IMAGE</th>
                                <th class="product-name">NAME</th>
                                <th class="product-price">PRICE</th>
                                <th class="product-quantity">QUANTITY</th>
                                <th class="product-total">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartproducts as $cartproduct)
                            <tr class="table-body-row" data-cart-id="{{ $cartproduct->id }}">
                                <td class="product-remove">
                                    <a href="{{ route('deleteproduct', $cartproduct->id) }}">
                                        <i class="fa-solid fa-circle-minus"></i>
                                    </a>
                                </td>
                                <td class="product-image">
                                    <img src="{{ asset('storage/'.$cartproduct->product->image) }}" alt="Product Image">
                                </td>
                                <td class="product-name"> {{ $cartproduct->product->name }}</td>
                                <td class="product-price" data-price="{{ $cartproduct->product->price }}">
                                    {{ $cartproduct->product->price }}
                                </td>
                                <td class="product-quantity">
                                    <input type="number" value="{{ $cartproduct->quntaity }}" min="0" class="quantity">
                                </td>
                                <td class="product-total">
                                    <span class="total" data-price="{{ $cartproduct->product->price }}">
                                        {{ $cartproduct->product->price * $cartproduct->quntaity }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>TOTAL</th>
                                <th>PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td>
                                    <strong>TOTAL:</strong>
                                </td>
                                <td id="totalprice">
                                    {{ $cartproducts->sum(function($cartproduct) {
                                        return $cartproduct->product->price * $cartproduct->quntaity;
                                    }) }} e.g
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="{{ route('checkout') }}" class="boxed-btn black">Check out</a>
                        <a href="{{ route('previousorder') }}" class="boxed-btn black">Previous Order</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- نهاية سلة التسوق -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {
    $(document).on('change', '.quantity', function() {
        var $row = $(this).closest('tr');
        var cartId = $row.data('cart-id');
        var quntaity = $(this).val();

        $.ajax({
            url: "{{ route('update.quantity') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                cart_id: cartId,
                quntaity: quntaity
            },
            success: function(response) {
                $row.find('.total').text(response.rowTotal.toFixed(2) + ' e.g');
                $('#totalprice').text(response.cartTotal.toFixed(2) + ' e.g');
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
            }
        });
    });
});


</script>
@endsection
