@extends('checklist/layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        Checklists
    </div>
    @foreach($checklists as $checklist)
    <a class="block mb-2 border border-solid border-gray-300" href="/checklist/{{ $checklist->id }}">
        <div class="mb-4 mt-2 mx-2">
            <div class="font-bold text-xl mb-2 break-words">{{ $checklist->name }}</div>
            <div class="mb-2 align-middle">
                🕛 {{ $checklist->created_at }},
                ✍️ {{ $checklist->user->name }}
            </div>
            <div class="break-words">
                {{ $checklist->description }}
            </div>
        </div>
    </a>
    @endforeach
    <a class="block mt-4" href="/checklist/create">
        <div class="md:max-w-full md:flex bg-gray-500 justify-center">
            <div class="mb-4 mt-2 ml-2 mr-2 font-bold text-xl text-black">
                Create
            </div>
        </div>
    </a>
    {{ $checklists->links('checklist/paginator') }}
</div>
@endsection
