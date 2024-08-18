@extends('back.layout.pages-layout')
@section('pagetitle')
@section('cont')
    <style>
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
    </style>

    <form method="POST" action="{{ route('orders.store') }}" class="p-6 bg-white border shadow-md rounded-2xl">
        @csrf
        <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
            <span class="highlighted-text">Add Order</span>
        </h3>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name" class="block mb-2 text-sm text-gray-600">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="address" class="block mb-2 text-sm text-gray-600">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                    @error('address')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="city" class="block mb-2 text-sm text-gray-600">City</label>
                    <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
                    @error('city')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="phone" class="block mb-2 text-sm text-gray-600">Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="customer_id" class="block mb-2 text-sm text-gray-600">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option selected disabled value="">Select Item</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>
@endsection
