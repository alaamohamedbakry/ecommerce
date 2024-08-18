<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ground.css') }}">
</head>
<body>
    <div class="signup">
        <form method="POST" action="{{ route('customer.register') }}">
            @csrf
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit" class="px-4 py-2 text-black bg-blue-500 rounded">Register</button>
        </form>
        <div class="login-link">
            <p style="color: white">Already have an account?<a class="button px-4 py-2 bg-gray-500 text-white rounded" href="{{ route('customer_login') }}" >Login</a>
            </p>
        </div>
    </div>
</body>
</html>
