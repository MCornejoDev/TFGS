<div class="flex flex-col space-y-4" x-data="{ show: @entangle('show') }">

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
        <div>
            <x-livewire.forms.select :items="$this->weapons" title="{{ __('characters.actions.create.form.weapon') }}"
                placeholder="{{ __('characters.actions.create.form.placeholder.weapon') }}" model="form.weaponId"
                optionId="id" optionLabel="name" dependsOn="characterTypeId" />
            <div x-show="show" x-transition>
                <x-livewire.forms.checkbox :label="__('characters.actions.create.form.shield')" model="form.shield" />
            </div>
        </div>
        <x-livewire.forms.label :label="__('characters.actions.create.form.label.armor')" :value="$this->armorLabel" />
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

    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.input :label="__('characters.actions.create.form.strength')" :placeholder="__('characters.actions.create.form.placeholder.strength')" type="number" model="form.strength" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.dexterity')" :placeholder="__('characters.actions.create.form.placeholder.dexterity')" type="number" model="form.dexterity" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.constitution')" :placeholder="__('characters.actions.create.form.placeholder.constitution')" type="number" model="form.constitution" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.intelligence')" :placeholder="__('characters.actions.create.form.placeholder.intelligence')" type="number" model="form.intelligence" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.wisdom')" :placeholder="__('characters.actions.create.form.placeholder.wisdom')" type="number" model="form.wisdom" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.charisma')" :placeholder="__('characters.actions.create.form.placeholder.charisma')" type="number" model="form.charisma" />
    </div>

    <div class="grid items-center grid-cols-2 gap-4">
        @for ($i = 0; $i <= 3; $i++)
            <x-livewire.forms.input :label="__('characters.actions.create.form.skill', ['number' => $i + 1])" :placeholder="__('characters.actions.create.form.placeholder.skill')" model="form.skills.{{ $i }}" />
        @endfor
    </div>

    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.input :label="__('characters.actions.create.form.height')" :placeholder="__('characters.actions.create.form.placeholder.height')" type="number" model="form.height" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.weight')" :placeholder="__('characters.actions.create.form.placeholder.weight')" type="number" model="form.weight" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.health')" :placeholder="__('characters.actions.create.form.placeholder.health')" type="number" model="form.health" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.level')" :placeholder="__('characters.actions.create.form.placeholder.level')" type="number" model="form.level" />
    </div>

    <textarea class="placeholder:font-bold textarea textarea-bordered bg-base-300"
        placeholder="{{ __('characters.actions.create.form.placeholder.personality') }}" wire:model="form.personality"></textarea>

    <x-livewire.forms.button :title="__('characters.actions.create.btn')" :action="'create'" />
</div>
