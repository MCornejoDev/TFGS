<div class="flex flex-col space-y-4">
    <x-livewire.forms.input :label="__('games.actions.create.form.name')" :placeholder="__('games.actions.create.form.placeholder.name')" model="form.name" />

    {{-- TODO: Add a multiselect for the users --}}

    <div class="w-full space-y-4">
        <x-livewire.forms.label :label="__('games.actions.create.form.label.date_start')" />
        <x-datetime-picker wire:model.live="form.date_start"
            placeholder="{{ __('games.actions.create.form.placeholder.date_start') }}"
            class="font-bold text-base-content/30" class="datePicker" />
    </div>

    <div class="w-full space-y-4">
        <x-livewire.forms.label :label="__('games.actions.create.form.label.comments')" />
        <textarea class="w-full placeholder:font-bold textarea textarea-bordered bg-base-300"
            placeholder="{{ __('games.actions.create.form.placeholder.comments') }}" wire:model="form.comments"></textarea>
    </div>

    <x-livewire.forms.button :title="__('games.actions.create.btn')" :action="'create'" />

</div>
