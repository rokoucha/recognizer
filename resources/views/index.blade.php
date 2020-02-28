@extends('layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        Recognizer - Support your recognition.
    </div>
    <p class="w-full break-words mb-2">
        Recognizer is simple checklist application.
        "Pointing and calling" makes strongly fewer mistakes.
        This application will support "Pointing and calling" with a checklist.

        Recognizer provides ordered or unordered checklists.
        Of course, nesting is also possible.
        Also, you can attach pictures and more information to the checklist.
    </p>
    <img class="mb-2" alt="Checklist" src="{{ asset('images/checklist.png') }}">
    <img class="mb-2" alt="Edit" src="{{ asset('images/editor.png') }}">
    <a class="block mt-4" href="/checklist">
        <div class="max-w-full flex bg-teal-300 justify-center">
            <div class="mb-4 mt-2 ml-2 mr-2 font-bold text-xl text-black">
                View Checklists
            </div>
        </div>
    </a>
</div>
@endsection
