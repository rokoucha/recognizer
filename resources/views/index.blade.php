@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        Recognizer - Support your recognition.
    </div>
    <p class="w-full break-words mb-2">
        {{ __('messages.Recognizer is simple checklist application.') }}
        {{ __('messages."Pointing and calling" makes strongly fewer mistakes.') }}
        {{ __('messages.This application will support "Pointing and calling" with a checklist.') }}

        {{ __('messages.Recognizer provides ordered or unordered checklists.') }}
        {{ __('messages.Of course, nesting is also possible.') }}
        {{ __('messages.Also, you can attach pictures and more information to the checklist.') }}
    </p>
    <img class="mb-2" alt="Checklist" src="{{ asset('images/checklist.png') }}">
    <img class="mb-2" alt="Edit" src="{{ asset('images/editor.png') }}">
    <a class="block mt-4" href="/checklist">
        <div class="max-w-full flex bg-teal-300 justify-center">
            <div class="mb-4 mt-2 ml-2 mr-2 font-bold text-xl text-black">
                {{ __('messages.View Checklists') }}
            </div>
        </div>
    </a>
</div>
@endsection
