@extends('back.layout.auth-layout')

@section('pagetitle', 'Register')

@section('cont')
<div class="container mx-auto p-4 max-width-600">
    <h1 class="text-2xl font-bold mb-6">Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email Address*</label>
            <div class="col-sm-8">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->has('email'))
                    <span class="text-red-600 text-sm">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Username*</label>
            <div class="col-sm-8">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name">
                @if ($errors->has('name'))
                    <span class="text-red-600 text-sm">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Password*</label>
            <div class="col-sm-8">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                @if ($errors->has('password'))
                    <span class="text-red-600 text-sm">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm Password*</label>
            <div class="col-sm-8">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                    <span class="text-red-600 text-sm">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button type="submit" class="btn btn-primary bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
