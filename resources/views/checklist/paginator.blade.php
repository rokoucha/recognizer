@if ($paginator->hasPages())
    <div class="mx-auto w-3/5 mt-2">
        <ul class="flex justify-between">
            @if ($paginator->onFirstPage())
            <li class="inline-block px-1 py-1 bg-teal-700 text-center text-bold text-black">
                <span>@lang('pagination.previous')</span>
            </li>
            @else
            <li class="inline-block px-1 py-1 bg-teal-300 text-center text-bold text-black">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    @lang('pagination.previous')
                </a>
            </li>
            @endif

            @if ($paginator->hasMorePages())
            <li class="inline-block px-1 py-1 bg-teal-300 text-center text-bold text-black">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    @lang('pagination.next')
                </a>
            </li>
            @else
            <li class="inline-block px-1 py-1 bg-teal-700 text-center text-bold text-black">
                <span>
                    @lang('pagination.next')
                </span>
            </li>
            @endif
        </ul>
    </div>
@endif
