@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('messages.confirm_password') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        <div class="block">
            {{ __('messages.please_confirm_your_password_before_continuing') }}
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="flex-col mb-2">
                <label for="password" class="block">{{ __('messages.password') }}</label>
                <input id="password" type="password" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="password" required autocomplete="current-password">
                @error('password')
                <span class="block" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-col mt-4">
                <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                    {{ __('messages.confirm_password') }}
                </button>
                @if (Route::has('password.request'))
                <a class="block mt-4 w-full h-auto p-1 bg-gray-500 cursor-pointer text-center text-lg text-black" href="{{ route('password.request') }}">
                    {{ __('messages.forgot_your_password') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
