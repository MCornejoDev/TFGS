@props([
    'id' => uniqid(),
    'label' => null,
    'model' => null,
    'class' => null,
    'placeholder' => null,
])

<div>
    <label for="input-{{ $id }}" class="block mb-2 text-sm font-medium text-base-content">
        {{ $label }}
    </label>

    <div
        class="flex items-center w-full gap-2 hover:border hover:border-base-content hover:rounded-lg hover:bg-base-300">
        <div @click="$refs.fileInput.click()" @class([
            'flex items-center justify-center w-full h-12 px-4 rounded-lg shadow cursor-pointer bg-base',
            'border-2 border-red-500' => $errors->has('form.' . $model),
        ])>
            <div wire:loading wire:target="form.{{ $model }}" class="w-full text-center text-base-content">
                @if (empty($this->form[$model]))
                    <div class="flex items-center justify-center gap-2">
                        <span>{{ __('validation.inputs.uploading') }}</span>
                        <span class="w-5 loading loading-spinner"></span>
                    </div>
                @else
                    <div class="flex items-center justify-center gap-2">
                        <span>{{ __('validation.inputs.removing') }}</span>
                        <span class="w-5 loading loading-spinner"></span>
                    </div>
                @endif
            </div>

            <div wire:loading.remove wire:target="form.{{ $model }}"
                class="w-full text-base text-center truncate text-base-content">
                @if (!isset($this->form[$model]) || empty($this->form[$model]))
                    <span @class([
                        'text-base-content' => !$errors->has('form.' . $model),
                        'text-red-500' => $errors->has('form.' . $model),
                    ])>{{ $placeholder }}</span>
                @elseif ($this->form[$model] instanceof \Illuminate\Http\UploadedFile)
                    {{ $this->form[$model]->getClientOriginalName() }}
                @elseif (is_string($this->form[$model]))
                    {{ basename($this->form[$model]) }}
                @endif
            </div>
        </div>

        @if (!empty($this->form[$model]))
            <x-heroicon-s-x-circle wire:click="$set('form.{{ $model }}', null)"
                class="w-8 h-8 text-red-500 cursor-pointer" />
        @endif
    </div>

    <input type="file" wire:model="form.{{ $model }}" x-ref="fileInput" class="hidden"
        accept="image/png, image/gif, image/jpeg, image/webp, image/jpg" wire:key="file-input-{{ $id }}" />

    @error('form.' . $model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
