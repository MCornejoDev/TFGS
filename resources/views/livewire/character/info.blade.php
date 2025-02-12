<div class="space-y-4">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
        <div class="items-center col-span-2 gap-6 p-6 pt-0 space-y-6 text-center rounded-lg shadow-lg bg-base md:col-span-1"
            x-data="{ show: false }" x-on:mouseover="show=true" x-on:mouseleave="show=false">
            <div class="flex items-center justify-end pt-2">
                <x-icon name="pencil" class="w-5 h-5 transition cursor-pointer text-base-content hover:text-blue-400"
                    x-show="show" outline wire:click="openSidePanel" />
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="space-y-4 text-center">
                    <x-livewire.labels.images :dataTip="$this->getTranslation('characters.races.', $this->character->raceLabel)" :src="$this->character->raceImage" :alt="__('characters.races.image')"
                        class="w-32 h-32 mx-auto rounded-full shadow-md" />
                </div>

                <div class="space-y-4 text-center">
                    <h2 class="text-lg font-semibold text-base-content">{{ __('characters.character.nickname') }}</h2>
                    <p class="text-base-content">{{ $this->character->nickname }}</p>
                    <div class="flex justify-center space-x-2">
                        <x-livewire.labels.images :dataTip="$this->getTranslation(
                            'characters.characters_types.',
                            $this->character->characterType->typeLabel,
                        )" :src="$this->character->characterType->image" :alt="__('characters.characters_types.image')"
                            class="w-10 h-10" />
                        <x-livewire.labels.images :dataTip="$this->getTranslation(
                            'characters.armors.',
                            $this->character->characterType->armorLabel,
                        )" :src="$this->character->characterType->armorImage" :alt="__('characters.armors.image')"
                            class="w-10 h-10" />
                        <x-livewire.labels.images :dataTip="$this->getTranslation(
                            'characters.weapons.',
                            $this->character->characterType->weaponLabel,
                        )" :src="$this->character->characterType->weaponImage" :alt="__('characters.weapons.image')"
                            class="w-10 h-10" />
                    </div>
                </div>

                <div class="space-y-4 text-center sm:col-span-2">
                    <div class="grid grid-cols-3 gap-4 lg:grid-cols-6">
                        <div class="space-y-2">
                            <x-livewire.labels.images :title="__('characters.character.genre')" :dataTip="$this->character->genderLabel" :src="$this->character->genderImage"
                                :alt="__('characters.genres.image')" class="!w-12 !h-12 mx-auto" />
                        </div>
                        <x-livewire.labels.rounded :title="__('characters.character.age')" :value="$this->character->age" />
                        <x-livewire.labels.rounded :title="__('characters.character.level')" :value="$this->character->level" />
                        <x-livewire.labels.rounded :title="__('characters.character.health')" :value="$this->character->health" />
                        <x-livewire.labels.rounded :title="__('characters.character.height')" :value="$this->character->height" />
                        <x-livewire.labels.rounded :title="__('characters.character.weight')" :value="$this->character->weight" />
                    </div>
                </div>

                <div class="space-y-4 text-center sm:col-span-2">
                    <h2 class="text-lg font-semibold text-base-content">{{ __('characters.character.personality') }}
                    </h2>
                    <p class="text-sm text-base-content">{{ $this->character->personality }}</p>
                </div>
            </div>
        </div>

        <div class="col-span-2 p-6 pt-0 space-y-6 rounded-lg shadow-lg bg-base md:col-span-1" x-data="{ show: false }"
            x-on:mouseover="show=true" x-on:mouseleave="show=false">
            <div class="flex items-center justify-end pt-2">
                <x-icon name="pencil" class="w-5 h-5 transition cursor-pointer text-base-content hover:text-blue-400"
                    x-show="show" outline wire:click="openSidePanel" />
            </div>

            <div class="grid grid-cols-2 gap-4 text-center md:grid-cols-3">
                <x-livewire.labels.rounded :title="__('characters.character.strength')" :value="$this->character->strength" />
                <x-livewire.labels.rounded :title="__('characters.character.dexterity')" :value="$this->character->dexterity" />
                <x-livewire.labels.rounded :title="__('characters.character.constitution')" :value="$this->character->constitution" />
                <x-livewire.labels.rounded :title="__('characters.character.intelligence')" :value="$this->character->intelligence" />
                <x-livewire.labels.rounded :title="__('characters.character.wisdom')" :value="$this->character->wisdom" />
                <x-livewire.labels.rounded :title="__('characters.character.charisma')" :value="$this->character->charisma" />
            </div>

            <div>
                <h2 class="text-lg font-semibold text-base-content">{{ __('characters.character.skills') }}</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach ($this->character->skills as $skill)
                        <span
                            class="px-3 py-1 text-sm font-medium rounded-full shadow bg-base text-base-content">{{ $loop->iteration }}º:
                            {{ $skill }}</span>
                    @endforeach
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-base-content">{{ __('characters.character.items') }}</h2>
                <p class="text-sm text-base-content">{{ $this->character->items }}</p>
            </div>
        </div>

        <div class="col-span-2">
            <x-livewire.charts.chart :type="$this->chart['type']" :data="$this->chart['data']" :options="$this->chart['options']" />
        </div>
    </div>

</div>
