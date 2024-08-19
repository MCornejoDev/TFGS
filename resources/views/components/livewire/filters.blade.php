<li class="gap-2 p-0 m-0 hover:bg-transparent" x-data="searchByForm">
    <div class="!cursor-default hover:bg-transparent transparent p-0 m-0 w-max">
        <h3>{{ __('header.filters.title') }}</h3>
    </div>
    <div class="!cursor-default hover:bg-transparent p-0 m-0">
        <select class="!w-72 select input input-bordered" x-on:change="selectCategory" x-model="category">
            <option disabled selected value="">{{ __('header.filters.select-category') }}</option>
            @foreach ($this->categoryTypes as $categoryType)
                <option value="{{ Str::snake($categoryType) }}">{{ __('category.types.' . Str::snake($categoryType)) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="!cursor-default hover:bg-transparent p-0 m-0">
        <input type="text" placeholder="{{ __('header.search.placeholder.name') }}"
            class="!w-72 input input-bordered" wire:model='search' />
    </div>
    <div class="!cursor-default hover:bg-transparent p-0 m-0">
        <input type="number" placeholder="{{ __('header.search.placeholder.min-price') }}"
            class="!w-72 input input-bordered" wire:model='minPrice' min="0" />
    </div>
    <div class="!cursor-default hover:bg-transparent p-0 m-0">
        <input type="number" placeholder="{{ __('header.search.placeholder.max-price') }}"
            class="!w-72 input input-bordered" wire:model='maxPrice' min="0" />
    </div>
    <div class="!cursor-default transparent hover:bg-transparent p-0 m-0 flex justify-between">
        <button class="btn input-bordered" x-on:click="clearFilters()" x-bind:disabled="checkParams">
            <div>{{ __('header.clear.btn') }}</div>
        </button>
        <button class="btn input-bordered" x-on:click="searchByTerm">
            <div x-show="loading" class="flex items-center gap-2">
                <span class="w-5 loading loading-spinner"></span>
                <span> {{ __('header.search.loading') }}</span>
            </div>
            <div x-show="!loading">{{ __('header.search.btn') }}</div>
        </button>
    </div>
</li>
