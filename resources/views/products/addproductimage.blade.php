@extends('back.layout.pages-layout')
@section('pagetitle')
@section('cont')

    <body>
        <form action="{{ route('storeproductimage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
            <label for="image" class="block mb-2 text-sm text-gray-600">Image</label>
            <input type="file" name="image" id="image"
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('image')
                <label for='image' class="font-bold text-red-800">{{ $message }}</label>
            @enderror
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="custom-button">SAVE EDITING</button>
            </div>
        </form>



            <div class="row">
                @foreach ($productimages as $productimage)
                    <div class="col">
                        <img class="m-2"src="{{ asset('storage/' . $productimage->photopath) }}" width="300"
                            height="300">
                        <form method="POST" action="{{ route('removeproductphotos', $productimage->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash" style="color:rgb(255, 0, 0)"> delete
                                    photo</i></button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection
