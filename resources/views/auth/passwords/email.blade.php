@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('messages.Reset Password') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        @if (session('status'))
        <span class="block" role="alert">{{ session('status') }}</span>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex-col mb-2">
                <label for="email" class="block">{{ __('messages.E-Mail Address') }}</label>
                <input id="email" type="email" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mt-4">
                <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                    {{ __('messages.Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
