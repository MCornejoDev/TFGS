@if ($paginator->hasPages())
    <div class="text-center">
        {{-- Mobile Version --}}
        <div class="sm:hidden">
            @if ($paginator->onFirstPage())
                <button class="cursor-default join-item btn" disabled>
                    {!! __('pagination.previous') !!}
                </button>
            @else
                <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                    class="join-item btn">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                    class="ml-3 join-item btn">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <button class="ml-3 cursor-default join-item btn" disabled>
                    {!! __('pagination.next') !!}
                </button>
            @endif
        </div>

        {{-- Desktop Version --}}
        <div class="flex-col items-center justify-between hidden w-full gap-4 sm:flex">
            <div>
                <span class="text-sm font-bold">
                    {!! __('pagination.showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-bold">{{ $paginator->firstItem() }}</span>
                        {!! __('pagination.to') !!}
                        <span class="font-bold">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('pagination.of') !!}
                    <span class="font-bold">{{ $paginator->total() }}</span>
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
                    <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        class="join-item btn">
                        {!! __('pagination.previous') !!}
                    </button>
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
                                <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    class="join-item btn">
                                    {{ $page }}
                                </button>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        class="join-item btn">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <button class="cursor-default join-item btn" disabled>
                        {!! __('pagination.next') !!}
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif
