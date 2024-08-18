@extends('back.layout.auth-layout')
@section('pagetitle')
@section('cont')
    <div class="bg-white login-box box-shadow border-radius-10">
            <div class="bg-white login-box box-shadow border-radius-10">
                <div class="login-title">
                    <h2 class="text-center text-primary">Login To Admin Page</h2>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group custom">
                        <input type="text" name="email" class="form-control form-control-lg" placeholder="Email"
                            value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group custom">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"
                            required>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row pb-30">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                <label class="custom-control-label" for="customCheck1">Remember</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="forgot-password">
                                <a href="{{ route('password.request') }}">Forgot Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-0 input-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                            </div>
                            <div class="pt-10 pb-10 text-center font-16 weight-600" data-color="#707373"
                                style="color: rgb(112, 115, 115);">
                                OR
                            </div>
                            <div class="mb-0 input-group">
                                <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register') }}">Register
                                    To Create Account</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
