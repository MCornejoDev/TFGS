<div class="flex flex-col space-y-4">
    <x-livewire.forms.input-file :label="__('users.actions.update.form.avatar')" type="file" model="avatar" class="p-0" :placeholder="__('user.actions.create.form.placeholder.avatar')" />

    <x-livewire.forms.input :label="__('users.actions.update.form.name')" :placeholder="__('users.actions.update.form.placeholder.name')" model="form.name" />
    <x-livewire.forms.input :label="__('users.actions.update.form.email')" :placeholder="__('users.actions.update.form.placeholder.email')" model="form.email" :type="'email'" />
    <x-livewire.forms.select :items="$this->timezones" title="{{ __('users.actions.update.form.timezone') }}"
        placeholder="{{ __('users.actions.update.form.placeholder.timezones') }}" model="form.timezone" optionId="id"
        optionLabel="name" />


    <x-livewire.forms.button :title="__('users.actions.create.btn')" :action="'create'" />
</div>
