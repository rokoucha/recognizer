@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('messages.Register') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex-col mb-2">
                <label for="name" class="block">{{ __('messages.Name') }}</label>
                <input id="name" type="text" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mb-2">
                <label for="email" class="block">{{ __('messages.E-Mail Address') }}</label>
                <input id="email" type="email" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mb-2">
                <label for="password" class="block">{{ __('messages.Password') }}</label>
                <input id="password" type="password" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="password" required autocomplete="new-password">
                @error('password')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mb-2">
                <label for="password-confirm" class="block">{{ __('messages.Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex-col mt-4">
                <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                    {{ __('messages.Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
