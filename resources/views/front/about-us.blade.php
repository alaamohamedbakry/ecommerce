@extends('layouts.master')
@section('content')
<style>
    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
    }
    .section-content {
        margin-left: 20px;
    }
    .highlight {
        color: #3490dc;
        font-weight: bold;
    }
    .icon {
        margin-right: 5px;
    }
</style>

<div class="container">
    <h1>About Our Online Retail Store</h1>
    <div class="section">
        <h2 class="section-title">Online Retail Stores</h2>
        <div class="section-content">
            <p class="highlight"><i class="icon fas fa-shopping-cart"></i> Product Listings:</p>
            <p>Businesses showcase their products through detailed listings that include images, descriptions, prices, and customer reviews.</p>
            <p class="highlight"><i class="icon fas fa-cart-plus"></i> Shopping Cart and Checkout:</p>
            <p>Users can add items to a virtual shopping cart and proceed to a secure checkout process to complete their purchases.</p>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Payment Processing</h2>
        <div class="section-content">
            <p class="highlight"><i class="icon fas fa-credit-card"></i> Payment Gateways:</p>
            <p>Integration with payment gateways like PayPal, Stripe, and credit card processors to facilitate secure transactions.</p>
            <p class="highlight"><i class="icon fas fa-wallet"></i> Multiple Payment Options:</p>
            <p>Offering various payment methods, including credit/debit cards, digital wallets, and bank transfers.</p>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Logistics and Fulfillment</h2>
        <div class="section-content">
            <p class="highlight"><i class="icon fas fa-box"></i> Order Management:</p>
            <p>Systems to track and manage orders from the moment of purchase to delivery.</p>
            <p class="highlight"><i class="icon fas fa-truck"></i> Shipping and Delivery:</p>
            <p>Partnerships with logistics companies to ensure timely and reliable delivery of products to customers.</p>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Customer Relationship Management (CRM)</h2>
        <div class="section-content">
            <p class="highlight"><i class="icon fas fa-headset"></i> Customer Support:</p>
            <p>Providing assistance through various channels, including live chat, email, and phone support.</p>
            <p class="highlight"><i class="icon fas fa-user-friends"></i> Personalization:</p>
            <p>Using customer data to offer personalized recommendations and marketing messages.</p>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Digital Marketing</h2>
        <div class="section-content">
            <p class="highlight"><i class="icon fas fa-search"></i> Search Engine Optimization (SEO):</p>
            <p>Techniques to improve website visibility on search engines.</p>
            <p class="highlight"><i class="icon fas fa-share-alt"></i> Social Media Marketing:</p>
            <p>Leveraging platforms like Facebook, Instagram, and Twitter to promote products and engage with customers.</p>
            <p class="highlight"><i class="icon fas fa-envelope"></i> Email Marketing:</p>
            <p>Sending targeted email campaigns to nurture leads and drive sales.</p>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
