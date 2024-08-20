@if ($paginator->hasPages())
    <div class="text-center">
        {{-- Mobile Version --}}
        <div class="sm:hidden">
            @if ($paginator->onFirstPage())
                <button class="cursor-default join-item btn" disabled>
                    {!! __('pagination.previous') !!}
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="ml-3 join-item btn">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <button class="ml-3 cursor-default join-item btn" disabled>
                    {!! __('pagination.next') !!}
                </button>
            @endif
        </div>

        {{-- Desktop Version --}}
        <div class="flex-col items-center justify-between hidden w-full gap-4 sm:flex">
            <div>
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    {!! __('pagination.showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('pagination.to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('pagination.of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('pagination.results') !!}
                </span>
            </div>

            <div class="join">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button class="cursor-default join-item btn" disabled>
                        {!! __('pagination.previous') !!}
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <button class="cursor-default join-item btn" disabled>{{ $element }}</button>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button class="join-item btn btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <button class="cursor-default join-item btn" disabled>
                        {!! __('pagination.next') !!}
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif
