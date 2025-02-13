<div class="max-h-full p-4 space-y-6 rounded-md shadow-lg bg-base">
    <div class="space-y-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
            <x-livewire.forms.input-image-with-preview :label="__('users.actions.update.form.avatar')" model="avatar" alt="avatar" />

            <x-livewire.forms.input :label="__('users.actions.update.form.name')" :placeholder="__('users.actions.update.form.placeholder.name')" model="form.name" class="!bg-base-100" />
            <div>
                <x-livewire.forms.input :label="__('users.actions.update.form.email')" :placeholder="__('users.actions.update.form.placeholder.email')" model="form.email" :type="'email'"
                    class="!bg-base-100" :icon="$this->emailVerifiedIcon" />
                <div class="pl-1">
                    @if (!$this->user->email_verified_at)
                        <x-livewire.forms.checkbox :label="__('users.actions.update.form.verify_email')" model="form.email_verified_at"
                            class="!bg-base-100" />
                    @endif
                </div>
            </div>
            <x-livewire.forms.select :items="$this->timezones"
                title="{{ __('users.actions.update.form.timezone') . ' : ' . $this->userTimeZone }}"
                placeholder="{{ __('users.actions.update.form.placeholder.timezones') }}" model="form.timezone"
                optionId="id" optionLabel="name" class="!bg-base-100" />

        </div>
    </div>

    <div class="flex justify-between">
        <x-livewire.forms.button :title="__('users.actions.delete.btn')" :action="'confirm'"
            class="bg-red-600 border-red-600 outline-red-600 hover:!border-white hover:bg-red-500 text-white" />
        <x-livewire.forms.button :title="__('users.actions.update.btn')" :action="'update'" />
    </div>
</div>
