  <style>
    /* خلفية متدرجة للصفحة */
body {
background: linear-gradient(135deg, #6ed3cf 0%, #3490dc 100%);
color: white;
font-family: 'Arial', sans-serif;
}

/* تنسيقات العناوين */
h1, h2  {
font-family: 'Helvetica', sans-serif;
font-weight: bold;
margin-bottom: 20px;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

h1 {
font-size: 36px;
}

h2 {
font-size: 28px;
}

/* تنسيق المحتوى */
.container5 {
padding: 40px;
max-width: 1200px;
margin: 0 auto;
background-color: rgba(255, 255, 255, 0.1); /* نصف شفاف لجعل النص واضح */
border-radius: 15px;
box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.section1 {
margin-bottom: 40px;
}

.section-title2 {
font-size: 28px;
font-weight: bold;
margin-top: 20px;
position: relative;
}

.section-title2::after {
content: '';
width: 50px;
height: 4px;
position: absolute;
left: 0;
bottom: -10px;
}

.section-content3 {
margin-left: 20px;
line-height: 1.8;
}

/* تنسيقات النص المميز */
.highlight4 {
color: #ff3366;
font-weight: bold;
display: flex;
align-items: center;
margin-bottom: 10px;
}

.highlight4 .icon {
margin-right: 10px;
color: #fff;
}

.section-content3 p {
margin-bottom: 10px;
}

/* تأثير التحويم على الأيقونات */
.highlight4:hover .icon {
transform: scale(1.2);
transition: transform 0.3s ease-in-out;
}

/* تأثير التحويم على النصوص */
.highlight4:hover {
color: black;
}

</style>

@extends('layouts.master')

@section('content')



<div class="container5">
    <h1>About Our Online Retail Store</h1>

    <div class="section1">
        <h2 class="section-title2">Online Retail Stores</h2>
        <div class="section-content3">
            <p class="highlight4"><i class="icon fas fa-shopping-cart"></i> Product Listings:</p>
            <p>Businesses showcase their products through detailed listings that include images, descriptions, prices, and customer reviews.</p>
            <p class="highlight4"><i class="icon fas fa-cart-plus"></i> Shopping Cart and Checkout:</p>
            <p>Users can add items to a virtual shopping cart and proceed to a secure checkout process to complete their purchases.</p>
        </div>
    </div>

    <div class="section1">
        <h2 class="section-title2">Payment Processing</h2>
        <div class="section-content3">
            <p class="highlight4"><i class="icon fas fa-credit-card"></i> Payment Gateways:</p>
            <p>Integration with payment gateways like PayPal, Stripe, and credit card processors to facilitate secure transactions.</p>
            <p class="highlight4"><i class="icon fas fa-wallet"></i> Multiple Payment Options:</p>
            <p>Offering various payment methods, including credit/debit cards, digital wallets, and bank transfers.</p>
        </div>
    </div>

    <div class="section1">
        <h2 class="section-title2">Logistics and Fulfillment</h2>
        <div class="section-content3">
            <p class="highlight4"><i class="icon fas fa-box"></i> Order Management:</p>
            <p>Systems to track and manage orders from the moment of purchase to delivery.</p>
            <p class="highlight4"><i class="icon fas fa-truck"></i> Shipping and Delivery:</p>
            <p>Partnerships with logistics companies to ensure timely and reliable delivery of products to customers.</p>
        </div>
    </div>

    <div class="section1">
        <h2 class="section-title2">Customer Relationship Management (CRM)</h2>
        <div class="section-content3">
            <p class="highlight4"><i class="icon fas fa-headset"></i> Customer Support:</p>
            <p>Providing assistance through various channels, including live chat, email, and phone support.</p>
            <p class="highlight4"><i class="icon fas fa-user-friends"></i> Personalization:</p>
            <p>Using customer data to offer personalized recommendations and marketing messages.</p>
        </div>
    </div>

    <div class="section1">
        <h2 class="section-title2">Digital Marketing</h2>
        <div class="section-content3">
            <p class="highlight"><i class="icon fas fa-search"></i> Search Engine Optimization (SEO):</p>
            <p>Techniques to improve website visibility on search engines.</p>
            <p class="highlight4"><i class="icon fas fa-share-alt"></i> Social Media Marketing:</p>
            <p>Leveraging platforms like Facebook, Instagram, and Twitter to promote products and engage with customers.</p>
            <p class="highlight4"><i class="icon fas fa-envelope"></i> Email Marketing:</p>
            <p>Sending targeted email campaigns to nurture leads and drive sales.</p>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
