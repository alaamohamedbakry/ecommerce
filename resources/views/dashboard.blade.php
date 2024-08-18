@extends('back.layout.pages-layout')
@section('pagetitle', 'dashboard')
@section('cont')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>

    <body>
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="pb-20 title">
                <h2 class="mb-0 h3">dashboard Overview</h2>
            </div>
            <div class="pb-10 row">
                <div class="mb-20 col-xl-3 col-lg-3 col-md-6">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark" id="total-customer">..</div>
                                <div class="font-14 text-secondary weight-500">customers</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-20 col-xl-3 col-lg-3 col-md-6">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark" id="total-order">..</div>
                                <div class="font-14 text-secondary weight-500">Total orders</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <span class="icon-copy ti-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-20 col-xl-3 col-lg-3 col-md-6">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark" id="total-products">+0</div>
                                <div class="font-14 text-secondary weight-500">Total products</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i class="fa-brands fa-product-hunt" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-20 col-xl-3 col-lg-3 col-md-6">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark" id="earnings">0.00</div>
                                <div class="font-14 text-secondary weight-500">Earning</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#09cc06">
                                    <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-10 row">
                <div class="mb-20 col-md-8">
                    <div class="card-box height-100-p pd-20">
                        <div class="flex-wrap pb-0 d-flex justify-content-between align-items-center pb-md-3">
                            <div class="h5 mb-md-0">e-commerce Activities</div>
                            <div class="form-group mb-md-0">
                                <select class="form-control form-control-sm selectpicker">
                                    <option value="">Last Week</option>
                                    <option value="">Last Month</option>
                                    <option value="">Last 6 Month</option>
                                    <option value="">Last 1 year</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-20 col-lg-4 col-md-6">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="pb-10 d-flex justify-content-between">
                            <div class="mb-0 h5">Top products</div>
                            <div class="dropdown">
                                <a class="p-0 btn btn-link font-24 line-height-1 no-arrow dropdown-toggle"
                                    data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="user-list">
                            <ul>
                                @foreach ($products as $product)
                                    <li class="d-flex align-items-center justify-content-between">
                                        <div class="pr-2 name-avatar d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-2 avatar">
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    class="border-radius-100 box-shadow" width="50" height="50"
                                                    alt="">
                                            </div>
                                            <div class="txt">
                                                <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5"
                                                    data-color="#265ed7">4.9</span>
                                                <div class="font-14 weight-600">{{ $product->name }}</div>
                                                <div class="font-12 weight-500" data-color="#b2b1b6">
                                                    {{ $product->price }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 cta">
                                            <a href="{{ route('products.create') }}"
                                                class="btn btn-sm btn-outline-primary">addproduct</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mb-20 col-lg-4 col-md-6">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="d-flex justify-content-between">
                            <div class="mb-0 h5">Product Report</div>
                            <div class="dropdown">

                            </div>
                        </div>
                        <div>
                            <canvas id="diseases_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-20 pb-20 title">
                <h2 class="mb-0 h3">Quick Start</h2>
            </div>

            <div class="row">
                <div class="mb-20 col-md-4">
                    <a href="#" class="mx-auto card-box d-block pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="{{asset('front/assets/images/OIP (1).jpeg')}}" alt="" />
                        </div>
                        <div class="content">
                            <h3 class="h4">Services</h3>
                            <p class="max-width-200">Shipping and Delivery Services:

                                Integration with Shipping Companies: Setting up various shipping options and automatically calculating shipping costs.
                                Order Tracking: Providing order tracking capabilities from purchase to delivery.
                                Digital Marketing:
                                
                                Search Engine Optimization (SEO): Enhancing website rankings in search engines to attract more visitors.
                                Social Media Marketing: Managing marketing campaigns on platforms like Facebook, Instagram, Twitter.
                                Email Marketing: Creating targeted email campaigns to increase sales.</p>
                        </div>
                    </a>
                </div>
                <div class="mb-20 col-md-4">
                    <a href="#" class="mx-auto card-box d-block pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="{{ asset('front/assets/images/OIP (2).jpeg') }}" alt="" />
                        </div>
                        <div class="content">
                            <h3 class="h4">E-commerce Control Management </h3>
                            <p class="max-width-200">E-commerce control management involves a set of systems and procedures aimed at ensuring the smooth and efficient operation of online business activities. This management covers several essential aspects to achieve business goals and enhance user experience. Below is a description of the key elements of e-commerce control management</p>
                        </div>
                    </a>
                </div>
                <div class="mb-20 col-md-4">
                    <a href="#" class="mx-auto card-box d-block pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="back/vendors/images/paper-map-cuate.svg" alt="" />
                        </div>
                        <div class="content">
                            <h3 class="h4">Locations</h3>
                            <p class="max-width-200">E-commerce locations refer to various geographical regions, markets, or physical spaces associated with an online business. These locations can be classified into several categories, each playing a critical role in the overall e-commerce ecosystem:
                                Geographical Markets:
                                Local Market: Focusing on a specific city or region within a country.
                                National Market: Serving customers across an entire country.
                                International Market: Expanding operations to multiple countries or globally.
                                Fulfillment Centers and Warehouses.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endsection



</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/gettotalcustomer',
            method: 'GET',
            success: function(response) {
                $('#total-customer').text(response.total);
            },
            error: function() {
                console.log('Error fetching total customers');
            }
        });

        $.ajax({
            url: '/total-order',
            method: 'GET',
            success: function(response) {
                $('#total-order').text(response.total);
            },
            error: function() {
                console.log('Error fetching total orders');
            }
        });

        $.ajax({
            url: '/total-products',
            method: 'GET',
            success: function(response) {
                $('#total-products').text(response.total);
            },
            error: function() {
                console.log('Error fetching total products');
            }
        });

        $.ajax({
            url: '/total-earnings',
            method: 'GET',
            success: function(response) {
                $('#earnings').text(parseFloat(response.totalEarnings).toFixed(2));
            },
            error: function() {
                console.log('Error fetching total earnings');
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        fetch('/chart-product').
        then(response => response.json()).then(data => {
            const labels = data.map(item => item.name);
            const quantities = data.map(item => item.quntaity);
            const colors = [
                'blue', 'red', 'yellow', 'green', 'orange', 'pink',
                'purple', 'cyan', 'magenta', 'lime', 'teal', 'brown'
            ];
            const bgColors = colors.map(color => {
                return `rgba(${color === 'blue' ? '0, 0, 255' : color === 'red' ? '255, 0, 0' : color === 'yellow' ? '255, 255, 0' : color === 'green' ? '0, 128, 0' : color === 'orange' ? '255, 165, 0' : color === 'pink' ? '255, 192, 203' : color === 'purple' ? '128, 0, 128' : color === 'cyan' ? '0, 255, 255' : color === 'magenta' ? '255, 0, 255' : color === 'lime' ? '0, 255, 0' : color === 'teal' ? '0, 128, 128' : '165, 42, 42'}, 0.5)`;
            });
            const ctx = document.getElementById('diseases_chart').getContext('2d');
            const diseases_chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'quantity',
                        data: quantities,
                        borderColor: colors,
                        backgroundColor: bgColors,
                        fill: false,
                        tension: 0.4
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'null',
                        },
                        title: {
                            display: true,
                            text: 'Products Reports'
                        }
                    },
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        fetch('/chart-earnings').then(response => response.json())
            .then(data => {
                const earnings = Array(12).fill(0);
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                data.forEach(item => {
                    earnings[item.month - 1] = item.total_earnings; // تعيين الربح في الشهر المناسب
                });

                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Earnings',
                            data: earnings,
                            borderColor: 'blue',
                            backgroundColor: 'rgba(0, 0, 255, 0.1)',
                            fill: true,
                            tension: 0.4
                        }],
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'E-commerce Activities'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                            }
                        }
                    }
                });
            });
    });
</script>
