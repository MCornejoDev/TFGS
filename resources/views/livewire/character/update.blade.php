<div class="flex flex-col space-y-4">
    <div class="grid items-center grid-cols-2 gap-4">
        <x-livewire.forms.input :label="__('characters.actions.create.form.age')" :placeholder="__('characters.actions.create.form.placeholder.age')" model="form.age" type="number" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.level')" :placeholder="__('characters.actions.create.form.placeholder.level')" type="number" model="form.level" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.health')" :placeholder="__('characters.actions.create.form.placeholder.health')" type="number" model="form.health" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.height')" :placeholder="__('characters.actions.create.form.placeholder.height')" type="number" model="form.height" />
        <x-livewire.forms.input :label="__('characters.actions.create.form.weight')" :placeholder="__('characters.actions.create.form.placeholder.weight')" type="number" model="form.weight" />
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

    {{-- TODO : The items is a text area or a select with creation --}}

    <x-livewire.forms.button :title="__('characters.actions.update.btn')" :action="'update'" />

</div>
