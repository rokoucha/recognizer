@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ __('messages.verify_your_email_address') }}
    </div>
    <div class="w-full text-center mb-2 text-lg text-gray-300">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('messages.a_fresh_verification_link_has_been_sent_to_your_email_address') }}
        </div>
        @endif
        {{ __('messages.before_proceeding_please_check_your_email_for_a_verification_link') }}
        {{ __('messages.if_you_did_not_receive_the_email') }},
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="w-full h-auto p-4 bg-teal-300 cursor-pointer font-bold text-xl text-black">
                {{ __('messages.click_here_to_request_another') }}
            </button>
        </form>
    </div>
</div>
@endsection
