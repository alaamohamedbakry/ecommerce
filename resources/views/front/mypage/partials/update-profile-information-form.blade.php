@extends('layouts.master')
@section('content')
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
          Profile Information
        </h2>
        <p class="mt-1 text-sm text-gray-600">
       Update your account's profile information and email address
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('customer.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('mypage.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <input-label for="name" :value="__('Name')" />
            <text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $customer->name)" required autofocus autocomplete="name" />
            <input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <input-label for="email" :value="__('Email')" />
            <text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $customer->email)" required autocomplete="username" />
            <input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($customer instanceof \Illuminate\Contracts\Auth::guard('customer')\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                       Your email address is unverified

                        <button form="send-verification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Click here to re-send the verification email
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                 A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button>Save</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >Saved.</p>
            @endif
        </div>
    </form>
</section>
