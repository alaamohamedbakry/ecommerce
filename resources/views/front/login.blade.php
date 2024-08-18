<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ground.css') }}">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="login-form">
            <form method="POST" action="{{ route('customer_login_submit') }}">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
               <div class="col-6">
                    <a href="{{ route('forget-password') }}">Forgot Password</a>
                </div>
                <div class="login-link">
                    <p style="color: white">Are you don't have an account?<a class="px-4 py-2 text-white bg-gray-500 rounded button" href="{{ route('customer.register') }}" >Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
