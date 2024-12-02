<div class="max-h-full p-4 space-y-6 border rounded-md shadow-lg border-base-content/30 bg-base-100">
    <div class="grid grid-cols-2 gap-4">
        <x-livewire.forms.input :label="__('users.actions.update.form.name')" :placeholder="__('users.actions.update.form.placeholder.name')" model="form.name" />
        <x-livewire.forms.input :label="__('users.actions.update.form.email')" :placeholder="__('users.actions.update.form.placeholder.email')" model="form.email" :type="'email'" />
        <x-livewire.forms.select :items="$this->timezones" title="{{ __('users.actions.update.form.timezone') }}"
            placeholder="{{ __('users.actions.update.form.placeholder.timezones') }}" model="form.timezone" optionId="id"
            optionLabel="name" />


        <x-livewire.forms.input-image-with-preview :label="__('users.actions.update.form.avatar')" model="avatar" alt="avatar" />
    </div>

    <div class="flex justify-between">
        <x-livewire.forms.button :title="__('users.actions.delete.btn')" :action="'confirm'"
            class="bg-red-600 border-red-600 outline-red-600 hover:!border-white hover:bg-red-500" />
        <x-livewire.forms.button :title="__('users.actions.update.btn')" :action="'update'" />
    </div>
</div>
