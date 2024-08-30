<div class="flex flex-col space-y-4">

    <x-livewire.forms.select :items="$this->games" title="{{ __('characters.actions.create.select.game') }}" model="gameId"
        optionId="id" optionLabel="name" optionDescription="comments" />

    <x-livewire.forms.select :items="$this->characterTypes" title="{{ __('characters.actions.create.select.character_type') }}"
        model="characterTypeId" optionId="id" optionLabel="name" optionDescription="description" />

    <x-livewire.forms.select :items="$this->races" title="{{ __('characters.actions.create.select.race') }}" model="raceId"
        optionId="id" optionLabel="name" optionDescription="description" />

    <div class="self-end">
        <button class="btn border-base-content/30"
            wire:click='create'>{{ __('characters.actions.create.btn') }}</button>

    </div>
</div>
