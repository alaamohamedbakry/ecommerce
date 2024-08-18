<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ground.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .main {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 300px;
        }
        .main h2 {
            color: #fff;
            margin-bottom: 15px;
        }
        .main h6 {
            color: #ccc;
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
        }
        .btn {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-outline-primary {
            background-color: transparent;
            border: 2px solid #007bff;
            color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        .text-center {
            text-align: center;
        }
        .font-16 {
            font-size: 16px;
        }
        .weight-600 {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="login-title">
            <h2>Forgot Password</h2>
        </div>
        <h6>Enter your email address to reset your password</h6>
        <form action="{{ route('send-password-reset-link') }}" method="POST">
            @csrf
            @if (Session::get('fail'))
            <div class="alert danger">
                {{ Sesstion::get('fail') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            @endif
            @if (Session::get('success'))
            <div class="alert success">
                {{ Sesstion::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="input-group custom">
                <input type="text" class="form-control form-control-lg" placeholder="Email" name="email" value="{{ old('email') }}" >
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                </div>
            </div>
            @error('email')
                <div class="block d text danger" style="margin-top:-25px;margin-button:15px">{{$message}}</div>
            @enderror
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mb-0 input-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-center font-16 weight-600" data-color="#707373" style="color: rgb(112, 115, 115); margin: 10px 0;">
                        OR
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-0 input-group">
                        <a class="btn btn-outline-primary btn-lg btn-block" href="login.html">Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
