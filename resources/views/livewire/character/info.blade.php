<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div class="items-center gap-12 p-8 text-center border border-base-content/30">
        <x-livewire.labels.images :dataTip="__('characters.races.' . snake_lower($this->character->raceLabel))" :src="$this->character->raceImage" :alt="__('characters.races.image')" class="w-36 h-36" />
        <div class="space-y-4">
            <div class="space-y-2 text-center">
                <h2>{{ __('characters.character.nickname') }}</h2>
                <div>{{ $this->character->nickname }}</div>
            </div>
            <div class="text-center">
                <x-livewire.labels.images :dataTip="__('characters.characters_types.' . snake_lower($this->character->characterType->typeLabel))" :src="$this->character->characterType->image" :alt="__('characters.characters_types.image')" />
                <x-livewire.labels.images :dataTip="__('characters.armors.' . snake_lower($this->character->characterType->armorLabel))" :src="$this->character->characterType->armorImage" :alt="__('characters.armors.image')" />
                <x-livewire.labels.images :dataTip="__('characters.weapons.' . snake_lower($this->character->characterType->weaponLabel))" :src="$this->character->characterType->weaponImage" :alt="__('characters.weapons.image')" />
            </div>
            <div class="grid grid-cols-3 gap-4 text-center lg:grid-cols-3 xl:grid-cols-5">
                <div class="space-y-2">
                    <x-livewire.labels.images :title="__('characters.character.genre')" :dataTip="$this->character->genderLabel" :src="$this->character->genderImage"
                        :alt="__('characters.genres.image')" class="!w-12 !h-12" />
                </div>
                <div class="space-y-2">
                    <x-livewire.labels.rounded :title="__('characters.character.age')" :value="$this->character->age" />
                </div>
                <div class="space-y-2">
                    <x-livewire.labels.rounded :title="__('characters.character.level')" :value="$this->character->level" />
                </div>
                <div class="space-y-2">
                    <x-livewire.labels.rounded :title="__('characters.character.height')" :value="$this->character->height" />
                </div>
                <div class="space-y-2">
                    <x-livewire.labels.rounded :title="__('characters.character.weight')" :value="$this->character->weight" />
                </div>
            </div>

            <div class="space-y-2 text-center">
                <h2>{{ __('characters.character.personality') }}</h2>
                <div class="text-sm">{{ $this->character->personality }}</div>
            </div>
        </div>
    </div>
    <div class="p-8 space-y-4 border border-base-content/30 lg:text-center">
        <div class="grid grid-cols-2 gap-4 text-center md:grid-cols-3">
            <x-livewire.labels.rounded :title="__('characters.character.strength')" :value="$this->character->strength" />
            <x-livewire.labels.rounded :title="__('characters.character.dexterity')" :value="$this->character->dexterity" />
            <x-livewire.labels.rounded :title="__('characters.character.constitution')" :value="$this->character->constitution" />
            <x-livewire.labels.rounded :title="__('characters.character.intelligence')" :value="$this->character->intelligence" />
            <x-livewire.labels.rounded :title="__('characters.character.wisdom')" :value="$this->character->wisdom" />
            <x-livewire.labels.rounded :title="__('characters.character.charisma')" :value="$this->character->charisma" />
        </div>
        <div class="col-span-2">
            <div class="space-y-4 text-center">
                <h2>{{ __('characters.character.skills') }}</h2>
                <div class="flex flex-row gap-2 text-center">
                    @foreach ($this->character->skills as $skill)
                        <div class="flex flex-col gap-1">
                            <div>{{ $loop->iteration }}º : {{ $skill }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div class="space-y-4 text-center">
                <h2>{{ __('characters.character.items') }}</h2>
            </div>
            {{ $this->character->items }}
        </div>
    </div>

    <div>
        <x-livewire.charts.chart :type="$this->chart['type']" :data="$this->chart['data']" />
    </div>
</div>
