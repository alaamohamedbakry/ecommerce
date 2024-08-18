{{-- resources/views/components/footer.blade.php --}}
<footer class="pt-16 pb-12 bg-white border-t border-gray-100">
    <div class="container grid grid-cols-1 ">
        <div class="col-span-1 space-y-4">
            <img src="{{ asset('front/assets/images/icons/LOGO2.png') }}" alt="logo" class="w-30">
            <div class="flex space-x-5">
                <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-facebook-square"></i></a>
                <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-instagram-square"></i></a>
                <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-twitter-square"></i></a>
                <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-github-square"></i></a>
            </div>
        </div>

        <div class="grid grid-cols-2 col-span-2 gap-4">
            <div class="grid grid-cols-2 gap-4 md:gap-8">
                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">Solutions</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Marketing</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Analitycs</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Commerce</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Insights</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">Support</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Pricing</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Guides</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">API Status</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">Solutions</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Marketing</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Analitycs</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Commerce</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Insights</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">Support</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Pricing</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">Guides</a>
                        <a href="#" class="block text-base text-gray-500 hover:text-gray-900">API Status</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="py-4 bg-gray-800">
    <div class="container flex items-center justify-between">
        <p class="text-white">&copy; TailCommerce - All Right Reserved</p>
        <div>
            <img src="{{ asset('front/assets/images/methods.png') }}" alt="methods" class="h-5">
        </div>
    </div>
</div>
