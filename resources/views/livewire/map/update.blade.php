<div class="flex flex-col space-y-4">
    <x-livewire.forms.input :label="__('maps.actions.update.form.name')" :placeholder="__('maps.actions.update.form.placeholder.name')" model="form.name" />

    <x-livewire.forms.input-file :label="__('maps.actions.create.form.link')" type="file" model="image" class="p-0" :placeholder="__('maps.actions.create.form.placeholder.link')" />


    <x-livewire.forms.button :title="__('maps.actions.update.btn')" :action="'update'" />

</div>
