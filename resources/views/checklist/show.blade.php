@extends('checklist/layout')
@section('content')
<div class="p-2 w-full">
    <div class="w-full text-center mb-2 text-xl text-teal-300">
        {{ $checklist->name }}
    </div>
    <div class="flex justify-center mb-2">
        <div class="px-4 my-auto">
            🕛 {{ $checklist->created_at }}
        </div>
        <div class="px-4 my-auto">
            ✍ {{ $checklist->user->name }}
        </div>
        <a href="/checklist/{{ $checklist->id }}/edit" class="mx-4 px-1 bg-gray-700 cursor-pointer text-gray-300">
            📄 Edit
        </a>
    </div>
    <div class="md:max-w-full md:flex border border-solid border-gray-300">
        <div class="mb-4 mt-2 mx-2 break-words">
            {{ $checklist->description }}
        </div>
    </div>
    <div class="my-2 border p-2">
        <div class="flex justify-center">
            @foreach ($checklist->attachments as $attachment)
            <div class="flex-col mx-2 mb-2 w-1/3">
                <a href="{{ $attachment->url }}" target="_blank">
                    <img
                        class="flex object-scale-down mx-auto mb-1 cursor-pointer"
                        alt="{{ $attachment->name }}"
                        src="{{ $attachment->url }}"
                    />
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <Checklist data="{{ $checklist->checks }}"></Checklist>
</div>
@endsection
