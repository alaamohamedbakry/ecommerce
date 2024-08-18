@extends('layouts.master')
@section('content')
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('front.mypage.partials.update-profile-information-form')
                </div>
            </div>
            
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('front.mypage.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
