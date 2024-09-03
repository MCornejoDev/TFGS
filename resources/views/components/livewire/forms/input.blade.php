<div>
    <label for="" class="block mb-2 text-sm font-medium text-base-content">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder }}"
        class=" {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }} w-full input input-bordered placeholder:text-sm placeholder:font-bold"
        wire:model="{{ $model }}" />
    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
