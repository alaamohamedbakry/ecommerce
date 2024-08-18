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
        color: green;
        display: inline;
        padding: 5px 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition-duration: 0.4s;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-color: #f1f1f1;
    }

    .custom-button:hover {
        background-color: #ddd;
    }
</style>

@extends('back.layout.pages-layout')
@section('pagetitle')
@section('cont')
    <form method="Post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container mx-auto space-y-6">
            <div class="p-4 border border-gray-200 rounded">
                <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
                    <span class="highlighted-text">Edit category</span>
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">NAME</label>
                        <input  type="text" value="{{ old('name', $category->name) }}" name="name"></input>
                        @error('name')
                            <label for="name">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="description">DESC</label>
                        <input type="text" value="{{ old('description', $category->description) }}" name="description"></input>
                        @error('description')
                            <label for="description">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="image">IMG</label>
                        <input class="mt-2 form-control" type="file" name="image">
                        @error('image')
                            <label for="name">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @if ($category->image)
                            <img class="rounded w-28 h-28" src="{{ asset('storage/' . $category->image) }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="custom-button">SAVE EDITING</button>
                </div>
            </div>
        </div>
    </form>
@endsection
