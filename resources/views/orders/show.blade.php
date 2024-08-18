@extends('back.layout.pages-layout')
@section('pagetitle')
@section('cont')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    @if (session()->has('status'))
        <div
            class="flex items-center justify-center px-2 py-1 m-1 font-medium text-green-700 bg-white bg-green-100 border border-green-300 rounded-md">
            <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 feather feather-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="text-xl font-normal">{{ session('status') }}</div>
            <div class="flex flex-row-reverse">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
        </div>
    @endif

    <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
        <span class="highlighted-text">Customer Details</span>
    </h3>
    <div class="p-4">
        <p style="color: red;"><strong>Name:</strong> {{ $order->name }}</p>
        <p style="color: red;"><strong>Email:</strong> {{ $order->email }}</p>
        <p style="color: red;"><strong>Address:</strong> {{ $order->address }}</p>
        <p style="color: red;"><strong>City:</strong> {{ $order->city }}</p>
        <p style="color: red;"><strong>Phone:</strong> {{ $order->phone }}</p>
    </div>
    <div class="table-responsive">

        <table id="orderdetails" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="px-6 py-4">Product Name</th>
                    <th scope="col" class="px-6 py-4">Quantity</th>
                    <th scope="col" class="px-6 py-4">Price</th>
                    <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdetails as $detail)
                    <tr class="border-b dark:border-neutral-500">
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quntaity }}</td>
                        <td>{{ $detail->price }} e.g</td>
                        <td>
                            <form method="post" action="{{ route('orderdetails.delete', $detail->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color:red"  >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
    </div>
    </div>
@endsection
<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css">

<script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        let table = new DataTable('#orderdetails');
    });
</script>
