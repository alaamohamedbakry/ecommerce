{{-- resources/views/components/header.blade.php --}}
<head>
    <style>
        #dropdownCustomerButton {
    background-color: #ffffff; /* لون الخلفية أبيض */
    border: 1px solid #d1d5db; /* إطار خفيف */
    border-radius: 0.375rem; /* زوايا مدورة */
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* ظل خفيف */
}

#dropdownCustomerMenu {
    border-radius: 0.375rem; /* زوايا مدورة */
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); /* ظل للقائمة */
    padding: 0.5rem 0; /* مسافة داخلية للقائمة */
}

#dropdownCustomerMenu a {
    padding: 0.5rem 1rem; /* مسافة داخلية للعناصر */
    transition: background-color 0.3s ease, color 0.3s ease; /* تأثير عند التحويم */
}

#dropdownCustomerMenu a:hover {
    background-color: #f9fafb; /* لون خلفية عند التحويم */
    color: #1f2937; /* لون النص عند التحويم */
}

    </style>
</head>

<header class="py-4 bg-white shadow-sm">
    <div class="container flex items-center justify-between">
        <a href="{{ route('index') }}">
            <img src="{{ asset('front/assets/images/icons/LOGO2.png') }}" alt="Logo" class="w-32">
        </a>

        <div class="relative flex w-full max-w-xl">
            <span class="absolute text-lg text-gray-400 left-4 top-3">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <form action="{{ route('search') }}" method="GET" class="flex w-full">
                @csrf
                <input type="text" name="search" id="search"
                    class="w-full py-3 pl-12 pr-3 border border-r-0 border-primary rounded-l-md focus:outline-none"
                    placeholder="search">
                <button
                    class="px-8 text-white transition border bg-primary border-primary rounded-r-md hover:bg-transparent hover:text-primary">Search</button>
            </form>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('front.cart') }}" class="relative text-center text-gray-700 transition hover:text-primary">
                <div class="text-2xl">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div class="text-xs leading-3">Cart</div>
            </a>
            <div class="text-1xl">
                @if (Auth::guard('customer')->check())
                <div class="relative inline-block text-left">
                    <button id="dropdownCustomerButton" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none">
                        <i class="fa-regular fa-user mr-2"></i> <!-- رمز المستخدم -->
                        welcome, {{ Auth::guard('customer')->user()->name }}
                    </button>
                    <div id="dropdownCustomerMenu" class="absolute right-0 hidden w-48 mt-2 origin-top-right bg-white border border-gray-300 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="none">
                            <a href="{{ route('customer_logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Log Out</a>
                        </div>
                    </div>
                </div>
              @elseif (Auth::check())
                <div class="relative inline-block text-left">
                    <button id="dropdownUserButton" class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md hover:text-black focus:outline-none">
                        <i class="fa-regular fa-user mr-2"></i>
                        welcome, {{ Auth::user()->name }}
                    </button>
                      <div id="dropdownUserMenu" class="absolute right-0 hidden w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="none">
                            <a href="{{ route('showdashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Dashboard</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Log Out</a>
                        </div>
                    </div>
                </div>
              @else
              <a href="{{ route('customer_login') }}" class="font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
              <a href="{{ route('customer.register.form') }}" class="ml-4 font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
              @endif
            </div>
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var customerDropdownButton = document.getElementById('dropdownCustomerButton');
        var customerDropdownMenu = document.getElementById('dropdownCustomerMenu');
        var userDropdownButton = document.getElementById('dropdownUserButton');
        var userDropdownMenu = document.getElementById('dropdownUserMenu');

        if (customerDropdownButton) {
            customerDropdownButton.addEventListener('click', function() {
                customerDropdownMenu.classList.toggle('hidden');
            });
        }

        if (userDropdownButton) {
            userDropdownButton.addEventListener('click', function() {
                userDropdownMenu.classList.toggle('hidden');
            });
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('#dropdownCustomerButton') && !event.target.matches('#dropdownUserButton')) {
                if (customerDropdownMenu) {
                    customerDropdownMenu.classList.add('hidden');
                }
                if (userDropdownMenu) {
                    userDropdownMenu.classList.add('hidden');
                }
            }
        };
    });
</script>
