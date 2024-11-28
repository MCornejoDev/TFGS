<div class="p-4 border rounded-md shadow-lg h-96 border-base-content/30 bg-base-100">
    <div class="flex flex-col space-y-4">
        <x-livewire.forms.input :label="__('users.actions.update.form.name')" :placeholder="__('users.actions.update.form.placeholder.name')" model="form.name" />
        <x-livewire.forms.input :label="__('users.actions.update.form.password')" :placeholder="__('users.actions.update.form.placeholder.password')" model="form.password" :type="'password'" />
        <x-livewire.forms.input :label="__('users.actions.update.form.email')" :placeholder="__('users.actions.update.form.placeholder.email')" model="form.email" :type="'email'" />

        <x-livewire.forms.button :title="__('games.actions.update.btn')" :action="'update'" />

    </div>

</div>
