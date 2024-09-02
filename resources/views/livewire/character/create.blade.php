<div class="flex flex-col space-y-4">

    <x-livewire.forms.select :items="$this->games" title="{{ __('characters.actions.create.form.game') }}"
        placeholder="{{ __('characters.actions.create.form.placeholder.game') }}" model="form.gameId" optionId="id"
        optionLabel="name" optionDescription="comments" />

    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.select :items="$this->races" title="{{ __('characters.actions.create.form.race') }}"
            placeholder="{{ __('characters.actions.create.form.placeholder.race') }}" model="form.raceId" optionId="id"
            optionLabel="name" />
        <x-livewire.forms.select :items="$this->characterTypes" title="{{ __('characters.actions.create.form.character_type') }}"
            placeholder="{{ __('characters.actions.create.form.placeholder.character_type') }}"
            model="form.characterTypeId" optionId="id" optionLabel="name" />
    </div>

    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.select :items="$this->weapons" title="{{ __('characters.actions.create.form.weapon') }}"
            placeholder="{{ __('characters.actions.create.form.placeholder.weapon') }}" model="form.weaponId"
            optionId="id" optionLabel="name" dependsOn="characterTypeId" />
        <x-livewire.forms.label :label="__('characters.actions.create.form.label.armor')" :value="$this->armor" />
    </div>

    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.select :items="$this->genders" title="{{ __('characters.actions.create.form.gender') }}"
            placeholder="{{ __('characters.actions.create.form.placeholder.gender') }}" model="form.gender"
            optionId="id" optionLabel="name" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.age')" :placeholder="__('characters.actions.create.form.placeholder.age')" model="form.age" type="number" />
    </div>

    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.input :label="__('characters.actions.create.form.name')" :placeholder="__('characters.actions.create.form.placeholder.name')" model="form.name" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.nickname')" :placeholder="__('characters.actions.create.form.placeholder.nickname')" model="form.nickname" />
    </div>


    <div class="self-end">
        <button class="btn border-base-content/30"
            wire:click='create'>{{ __('characters.actions.create.btn') }}</button>

    </div>
</div>
