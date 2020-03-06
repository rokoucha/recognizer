@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('Login') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex-col mb-2">
                <label for="email" class="block">{{ __('messages.E-Mail Address') }}</label>
                <input id="email" type="email" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @if ($errors->has('email'))
                <span class="block" role="alert">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="flex-col mb-2">
                <label for="password" class="block">{{ __('messages.Password') }}</label>
                <input id="password" type="password" class="w-2/5 text-center border border-gray-300 bg-gray-900" name="password" required autocomplete="current-password">
                @if ($errors->has('password'))
                <span class="block">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="flex mb-2">
                <div class="mx-auto">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('messages.Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="flex-col">
                <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                    {{ __('messages.Login') }}
                </button>
                @if (Route::has('password.request'))
                <a class="block mt-4 w-full h-auto p-1 bg-gray-500 cursor-pointer text-center text-lg text-black" href="{{ route('password.request') }}">
                    {{ __('messages.Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
