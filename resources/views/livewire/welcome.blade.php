<div class="pt-4">
    <div class="">
        <!-- Welcome Section -->
        <main class="container px-6 py-12 mx-auto">
            <!-- Greeting -->
            <div class="mb-12 text-center">
                <h2 class="text-4xl font-bold ">
                    {{ __('home.welcome', ['name' => $this->user->name]) }}</h2>
                <p class="mt-4 text-secondary-500">{{ __('home.sub_title') }}</p>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 gap-6 mb-12 md:grid-cols-3">
                <div class="p-6 rounded-lg shadow bg-base">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold ">{{ __('home.games.active') }}</h3>
                        <x-heroicon-s-arrow-right-circle class="w-8 h-8 cursor-pointer"
                            href="{{ route('games.index') }}" wire:navigate />
                    </div>
                    <p class="mt-4 text-4xl font-semibold ">{{ $this->user->games->count() }}</p>
                </div>
                <div class="p-6 rounded-lg shadow bg-base">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold ">{{ __('home.characters.created') }}</h3>
                        <x-heroicon-s-arrow-right-circle class="w-8 h-8 cursor-pointer"
                            href="{{ route('characters.index') }}" wire:navigate />
                    </div>
                    <p class="mt-4 text-4xl font-semibold ">
                        {{ $this->charactersCount }}</p>
                </div>
                <div class="p-6 rounded-lg shadow bg-base">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold ">{{ __('home.maps.designed') }}</h3>
                        <x-heroicon-s-arrow-right-circle class="w-8 h-8 cursor-pointer" href="{{ route('maps.index') }}"
                            wire:navigate />
                    </div>
                    <p class="mt-4 text-4xl font-semibold ">5</p>
                </div>
            </div>

            <!-- Campaigns Overview -->
            <div class="mb-12">
                <h3 class="mb-6 text-2xl font-bold ">{{ __('home.games.newly_created') }}</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach ($this->games as $game)
                        <div class="gap-4 p-6 rounded-lg shadow bg-base">
                            <h4 class="text-xl font-bold ">{{ $game->name }}</h4>
                            <p class="mt-2 text-secondary-500">{{ $game->description }}</p>
                            <x-button icon="eye" label="{{ __('home.games.details') }}"
                                class="!btn !border-base-content/30 !outline-none rounded mt-4"
                                href="{{ route('games.info', ['id' => $game->id]) }}" wire:navigate />
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- Characters Overview -->
            <div class="mb-12">
                <h3 class="mb-6 text-2xl font-bold ">{{ __('home.characters.newly_created') }}</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    @foreach ($this->characters as $character)
                        <div class="p-4 rounded-lg shadow bg-base">
                            <h4 class="text-lg font-bold ">{{ $character->name }} - ({{ $character->nickname }})</h4>
                            <p class="text-secondary-500">{{ $character->characterType->typeLabel }} -
                                ({{ $character->level }})
                            </p>
                            <x-button icon="eye" label="{{ __('home.characters.details') }}"
                                class="!btn !border-base-content/30 !outline-none rounded mt-4"
                                href="{{ route('characters.info', ['id' => $character->id]) }}" wire:navigate />
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
