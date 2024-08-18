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

<form enctype="multipart/form-data" method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PATCH')
    <div class="container mx-auto space-y-6">
        <div class="p-4 border border-gray-200 rounded">
            <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
                <span class="highlighted-text">Edit Product</span>
            </h3>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">NAME</label>
                    <input type="text" class="form-control" value="{{ old('name', $product->name) }}" name="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">PRICE</label>
                    <input type="number" class="form-control" value="{{ old('price', $product->price) }}" name="price">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="catergories_id" class="form-label">Category Name</label>
                    <select name="catergories_id" class="form-select">
                        <option selected disabled value="">Select Item</option>
                        @foreach ($catergories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->catergories_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('catergories_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="quntaity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" value="{{ old('quntaity', $product->quntaity) }}" name="quntaity">
                    @error('quntaity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">IMAGE</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    @if ($product->image)
                        <img class="rounded w-28 h-28" src="{{ asset('storage/' . $product->image) }}" alt="">
                    @endif
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">DESC</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="custom-button">SAVE EDITING</button>
            </div>
        </div>
    </div>
</form>
@endsection
