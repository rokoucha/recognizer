@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('messages.reset_password') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="flex-col mb-2">
                <label for="email" class="block">{{ __('messages.e-mail_address') }}</label>
                <input id="email" type="email" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mb-2">
                <label for="password" class="block">{{ __('messages.password') }}</label>
                <input id="password" type="password" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="password" required autocomplete="new-password">
                @error('password')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mb-2">
                <label for="password-confirm" class="block">{{ __('messages.confirm_password') }}</label>
                <input id="password-confirm" type="password" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex-col mt-4">
                <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                    {{ __('messages.reset_password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
