@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('Verify Your Email Address') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                {{ __('click here to request another') }}
            </button>
        </form>
    </div>
</div>
@endsection
