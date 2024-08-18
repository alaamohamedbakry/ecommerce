@extends('back.layout.pages-layout')
@section('pagetitle', 'Product Details')

@section('cont')
<tbody>
    <tr class="border-b dark:border-neutral-500">
        <td class="whitespace-nowrap px-8 py-4 font-medium">
            {{ $product->name }}
        </td>
        <td class="whitespace-nowrap px-8 py-4 font-medium">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if ($product->image)
                    <img class="rounded-t-lg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                @endif
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $product->description }}
                    </h5>
                    <div class="p-5">
                        <span class="whitespace-nowrap px-6 py-4 font-medium">
                            Quantity: {{ $product->quntaity }}
                        </span>
                    </div>
                    <div class="p-5">
                        <span class="whitespace-nowrap px-6 py-4 font-medium">
                            PRICE: {{ $product->price }}
                        </span>
                    </div>
                    <div class="p-5">
                        <span class="whitespace-nowrap px-6 py-4 font-medium">
                            UPDATED_AT: {{ $product->updated_at }}
                        </span>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</tbody>
<div class="product-detail-wrap mb-30">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="product-slider-nav slick-initialized slick-slider">
                <button class="slick-prev slick-arrow" aria-label="Previous" type="button">Previous</button>
                <div class="slick-list draggable">
                    <div class="slick-track">
                        @foreach ($product->productphoto as $item)
                            <div class="product-slide-nav slick-slide">
                                <img src="{{ asset('storage/' . $item->photopath) }}" alt="Product Image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="slick-next slick-arrow" aria-label="Next" type="button">Next</button>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="product-detail-desc pd-20 card-box height-100-p">
                <h4 class="mb-20 pt-20">{{ $product->name }}</h4>
                <p>{{ $product->description }}</p>
                <p>{{ $product->details }}</p>
                <div class="price">
                    <ins>${{ $product->price }}</ins>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('.product-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.product-slider-nav'
        });
        $('.product-slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-slider',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    });
</script>
@endsection
