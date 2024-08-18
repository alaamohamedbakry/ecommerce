<style>
    /* تصفيف العنصر h1 */
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 40px;
        font-size: 2.5em;
    }

    .testimonial {
        border-bottom: 1px solid #ddd;
        padding: 30px 20px;
        transition: transform 0.3s;
        background-color: #f9f9f9; /* خلفية خفيفة */
        border-radius: 10px; /* زوايا دائرية */
    }

    .testimonial:hover {
        transform: scale(1.02);
    }

    .testimonial:last-child {
        border-bottom: none;
    }

    .testimonial-content {
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
        font-size: 1.2em;
    }

    .customer-info {
        display: flex;
        align-items: center;
        gap: 10px; /* المسافة بين الصورة والنصوص */
    }

    .customer-info img {
        border-radius: 50%; /* شكل دائري للصورة */
        width: 60px; /* عرض ثابت */
        height: 60px; /* ارتفاع ثابت */
        object-fit: cover; /* احتواء الصورة */
    }

    .customer-name {
        font-weight: bold;
        color: #333;
        margin: 0;
    }

    .customer-role {
        color: #777;
        margin-top: 5px;
    }

    .highlighted-text {
        font-weight: bold;
        color: #FFA500;
        display: inline;
    }

    .highlighted-text::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: #FFA500;
        margin-top: 5px;
    }

    .header-text {
        display: flex;
        align-items: center;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }
</style>

@extends('layouts.master')
@section('content')
<div class="form-container">
    <form method="POST" action="{{ route('storereview') }}"
        class="p-6 bg-white border shadow-md rounded-2xl">
        @csrf
        <div class="p-4 border border-gray-200 rounded">
            <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
                <span class="highlighted-text">Add Review</span>
            </h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-2 text-sm text-gray-600">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                    <x-input-label for='name' class="font-bold text-red-800">{{ $message }}</x-input-label>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm text-gray-600">Phone <span class="text-red-500">*</span></label>
                    <input type="number" name="phone" id="phone" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone')
                    <x-input-label for='phone' class="font-bold text-red-800">{{ $message }}</x-input-label>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="email" class="block mb-2 text-sm text-gray-600">E-mail</label>
                    <input type="text" name="email" id="email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                    <x-input-label for='email' class="font-bold text-red-800">{{ $message }}</x-input-label>
                    @enderror
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm text-gray-600">Subject</label>
                    <input type="text" name="subject" id="subject" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('subject')
                    <x-input-label for='subject' class="font-bold text-red-800">{{ $message }}</x-input-label>
                    @enderror
                </div>
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm text-gray-600">Message</label>
                <textarea name="message" id="message" cols="30" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('message')
                <x-input-label for='message' class="font-bold text-red-800">{{ $message }}</x-input-label>
                @enderror
            </div>
            <div class="flex justify-end mt-4">
                <x-primary-button>
                    SAVE
                </x-primary-button>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <h1>آراء العملاء</h1>
    @foreach ($reviews as $review)
    <div class="testimonial">
        <div class="testimonial-content">
            <p>{{ $review->message }}</p>
        </div>
        <div class="customer-info">
            <img src="{{ asset('front/assets/images/avatar.png') }}" alt="Customer 1">
            <div>
                <p class="customer-name">{{ $review->name }}</p>
                <p class="customer-role">{{ $review->subject }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $reviews->links() }}
@endsection
