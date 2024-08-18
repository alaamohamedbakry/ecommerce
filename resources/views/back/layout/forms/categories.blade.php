@extends('back.layout.pages-layout')
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
        color: green /* لون النص */
        display: inline;
        padding: 2px 3px; /* حجم الزر */
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition-duration: 0.4s;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

</style>
<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" class="p-2 border rounded-2xl">
    <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
        <span class="highlighted-text">ADD NEW category</span>
    </h3>
    @csrf
	<div class="grid grid-cols-2 gap-4">
		<div class="col-md-4 col-sm-12">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ old('name') }}" name='name' class="form-control">
                @error('name')
                <label for='name'>{{ $message }}</label>
                @enderror
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="form-group">
                <label>IMG</label>
                <input type="file"  name="image"  value="image"class="form-control-file form-control height-auto">
                @error('image')
                <label for='image'>{{ $message }}</label>
                @enderror
            </div>
		</div>
        <div class="form-group">
            <label>description</label>
            <textarea class="form-control" value="{{ old('description') }}"
            name="description"></textarea>
        </div>
	</div>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>
@endsection
