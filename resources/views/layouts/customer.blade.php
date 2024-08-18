<!-- resources/views/layouts/customer.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'nonia') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="flex flex-col justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-sm p-6 mx-auto bg-white rounded-lg shadow-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
