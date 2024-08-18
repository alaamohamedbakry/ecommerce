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

    .custom-button {
        color: white;
        background-color: #FFA500;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.4s;
    }

    .custom-button:hover {
        background-color: #e59400;
    }
</style>

@extends('back.layout.pages-layout')
@section('pagetitle')
@section('cont')
    <h1 class="w-24 min-w-full md:min-w-0"></h1>
    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
        @csrf
        @method('PATCH')
        <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
            <span class="highlighted-text">Edit Customer</span>
        </h3>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">NAME</label>
                    <input type="text" class="form-control" value="{{ $customer->name }}" name="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email">EMAIL</label>
                    <input type="text" class="form-control" value="{{ old('email', $customer->email) }}" name="email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" value="{{ old('password', $customer->password) }}" name="password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="custom-button">SAVE EDITING</button>
            </div>
        </div>
    </form>
@endsection
