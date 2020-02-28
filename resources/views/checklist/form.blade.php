<div class="p-2 w-full">
    <form method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="w-full text-center mb-2 text-xl text-gray-300">
            <input type="text" name="name" value="{{ $checklist->name }}" placeholder="Title" class="w-3/5 text-center border border-gray-300 bg-gray-900">
        </div>
        @if($mode === 'edit')
        <div class="flex justify-center mb-2">
            <div class="px-4 text-center">
                🕛 {{ $checklist->created_at }}
            </div>
            <div class="px-4 text-center">
                ✍ {{ $checklist->user->name }}
            </div>
            <button type="submit" onclick="return confirm('Are you sure you want to delete checklist?')" formaction="/checklist/{{ $checklist->id }}" name="_method" value="delete" class="px-2 bg-gray-700 cursor-pointer text-gray-300">
                🗑 Delete
            </button>
        </div>
        @endif
        <div class="md:max-w-full md:flex border border-solid border-gray-300 bg-gray-900">
            <textarea type="text" name="description" placeholder="Description" class="w-full my-2 mx-2 bg-gray-900 text-gray-300">{{ $checklist->description }}</textarea>
        </div>
        <Attachments checklist="{{ $checklist->id }}" data="{{ json_encode($checklist->attachments) }}"></Attachments>
        <Checklist-Editor data="{{ $checklist->checks }}"></Checklist-Editor>
        @if($mode === 'create')
        <button type="submit" formaction="/checklist" name="_method" value="post" class="w-full h-auto p-2 bg-teal-300 cursor-pointer font-bold text-xl text-black">
            Create
        </button>
        @elseif($mode === 'edit')
        <button type="submit" formaction="/checklist/{{ $checklist->id }}" name="_method" value="put" class="w-full h-auto p-2 bg-teal-300 cursor-pointer font-bold text-xl text-black">
            Save
        </button>
        @endif
    </form>
</div>
