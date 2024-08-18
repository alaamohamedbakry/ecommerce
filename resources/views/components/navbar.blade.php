{{-- resources/views/components/navbar.blade.php --}}
<head>
    <link rel="stylesheet" href="{{ asset('front/assets/css/drop.css') }}">
</head>
<nav class="bg-gray-800">
    <div class="container flex">
        <div class="flex items-center justify-between flex-grow py-5 md:pl-12">
            <div class="flex items-center space-x-6 capitalize">
                <a href="{{ route('index') }}" class="text-gray-200 transition hover:text-white">Home</a>
                <a href="{{ route('shop') }}" class="text-gray-200 transition hover:text-white">Shop</a>
                <a href="{{ route('about_us') }}" class="text-gray-200 transition hover:text-white">About us</a>
                <a href="{{ route('contact_us') }}" class="text-gray-200 transition hover:text-white">Contact us</a>
                <a href="{{ route('review') }}" class="text-gray-200 transition hover:text-white">Reviews</a>
            </div>
           
        </div>
    </div>
</nav>



