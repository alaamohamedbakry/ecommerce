@extends('back.layout.pages-layout')
@section('pagetitle')
@section('cont')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <style>
        a:hover {
            color: red;
            cursor: pointer;
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

    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="table-responsive">
        <table id="producttable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>IMAGE</th>
                    <th>QUANTITY</th>
                    <th>CATEGORY NAME</th>
                    <th>CREATED AT</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->image)
                                <img class="rounded w-28 h-28" src="{{ asset('storage/' . $product->image) }}" alt="">
                            @endif
                        </td>
                        <td>{{ $product->quntaity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="{{ route('addproductimage', $product->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


@endsection
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        let table = new DataTable('#producttable');
    });
</script>
