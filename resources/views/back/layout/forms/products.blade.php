@extends('back.layout.pages-layout')
@section('pagetitle', 'Add Products')
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
    <form enctype="multipart/form-data" method="POST" action="{{ route('products.store') }}"
        class="p-6 bg-white border shadow-md rounded-2xl">
        @csrf
        <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
            <span class="highlighted-text">Add Products</span>
        </h3>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name" class="block mb-2 text-sm text-gray-600">Name <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="price" class="block mb-2 text-sm text-gray-600">Price <span class="text-red-500">*</span></label>
                    <input type="number" class="form-control" name="price" id="price">
                    @error('price')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="quntaity" class="block mb-2 text-sm text-gray-600">Quantity</label>
                    <input type="number" class="form-control" name="quntaity" id="quntaity">
                    @error('quntaity')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="image" class="block mb-2 text-sm text-gray-600">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="catergories_id" class="block mb-2 text-sm text-gray-600">Category Name</label>
                    <select name="catergories_id" id="catergories_id" class="form-control">
                        <option selected disabled value="">Select Item</option>
                        @foreach ($catergories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('catergories_id')
                        <span class="font-bold text-red-800">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="description" class="block mb-2 text-sm text-gray-600">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                    @error('description')
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
