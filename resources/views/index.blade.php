@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        Recognizer - Support your recognition.
    </div>
    <p class="w-full break-words mb-2">
        {{ __('messages.recognizer_is_simple_checklist_application') }}
        {{ __('messages.pointing_and_calling_makes_strongly_fewer_mistakes') }}
        {{ __('messages.this_application_will_support_Pointing_and_calling_with_a_checklist') }}

        {{ __('messages.recognizer_provides_ordered_or_unordered_checklists') }}
        {{ __('messages.of_course_nesting_is_also_possible') }}
        {{ __('messages.also_you_can_attach_pictures_and_more_information_to_the_checklist') }}
    </p>
    <img class="mb-2" alt="Checklist" src="{{ asset('images/checklist.png') }}">
    <img class="mb-2" alt="Edit" src="{{ asset('images/editor.png') }}">
    <a class="block mt-4" href="/checklist">
        <div class="max-w-full flex bg-teal-300 justify-center">
            <div class="mb-4 mt-2 ml-2 mr-2 font-bold text-xl text-black">
                {{ __('messages.view_checklists') }}
            </div>
        </div>
    </a>
</div>
@endsection
