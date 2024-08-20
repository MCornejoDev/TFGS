<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($this->characters as $character)
            <div class="shadow-xl card bg-base-100 w-96">
                <figure class="px-10 pt-10">
                    <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes"
                        class="rounded-xl" />
                </figure>
                <div class="items-center text-center card-body">
                    <h2 class="card-title">{{ $character->name }}</h2>
                    <p>{{ $character->nickname }}</p>
                    <p class="text-sm">{{ __('characters.races.' . Str::lower(Str::snake($character->race))) }}</p>
                    <p>{{ $character->gender }}</p>
                    <p>{{ __('characters.characters_types.' . Str::lower(Str::snake($character->characterType->type))) }}
                    </p>
                    <p class="rounded-full "><img src="{{ $character->characterType->image }}" alt="Character Type"
                            class="w-16 h-16 rounded-full"></p>
                    </p>
                    <div class="card-actions">
                        <button class="btn btn-primary">{{ __('characters.actions.history') }}</button>
                        <button class="btn btn-info">{{ __('characters.actions.information') }}</button>
                        <button class="btn btn-error">{{ __('characters.actions.delete') }}</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $this->characters->links() }}
</div>
