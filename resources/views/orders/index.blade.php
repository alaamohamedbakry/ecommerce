@extends('back.layout.pages-layout')
@section('pagetitle', 'Order List')

@section('cont')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css">

        <style>
            a:hover {
                color: red;
                cursor: pointer;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 12px;
                border: 1px solid #ddd;
                text-align: center;
            }

            th {
                background-color: #f4f4f4;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .action-buttons a,
            .action-buttons form {
                display: inline-block;
                margin: 0 5px;
            }

            .fa-user-pen {
                color: blue;
            }

            .fa-trash {
                color: red;
            }
        </style>
    </head>

    @if (session()->has('status'))
        <div
            class="flex items-center justify-center px-2 py-1 m-1 font-medium text-green-700 bg-white bg-green-100 border border-green-300 rounded-md ">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 mx-2 feather feather-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="flex-initial max-w-full text-xl font-normal">
                {{ session('status') }}</div>
            <div class="flex flex-row-reverse flex-auto">
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

    <div class="table-responsive">
        <table id="ordertable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="px-6 py-4 ">#</th>
                    <th scope="col" class="px-6 py-4 ">Name</th>
                    <th scope="col" class="px-6 py-4 ">Email</th>
                    <th scope="col" class="px-6 py-4 ">Address</th>
                    <th scope="col" class="px-6 py-4 ">City</th>
                    <th scope="col" class="px-6 py-4 ">Phone</th>
                    <th scope="col" class="px-6 py-4 ">Updated_at</th>
                    <th scope="col" class="px-6 py-4 ">Details</th>
                    <th scope="col" class="px-6 py-4 ">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->id }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->name }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->email }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->address }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->city }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->phone }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $order->updated_at }}
                        </td>
                        <td><a href="{{ route('orders.show', $order->id) }}">View Details</a></td>
                        <td class="action-buttons">
                            <a href="{{ route('orders.edit', $order->id) }}">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                            <form method="post" action="{{ route('orders.destroy', $order->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:none;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 font-medium whitespace-nowrap">
                            No orders found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#ordertable').DataTable();
            });
        </script>
    @endsection
