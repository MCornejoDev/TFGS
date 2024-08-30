<div class="flex flex-col space-y-4">
    <div>
        <x-select label="Search a User" placeholder="Select some user" :options="$this->games" option-label="name"
            option-value="id" option-description="comments" class="font-bold text-base-content/30" />
    </div>

    <div>
        <select class="w-full font-bold rounded select input-bordered">
            <option disabled selected>{{ __('characters.actions.create.select') }}</option>
            @foreach ($this->characterTypes as $key => $item)
                <option value="{{ $key }}" class="font-bold rounded">{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="self-end">
        <button class="btn">{{ __('characters.actions.create.btn') }}</button>

    </div>
</div>
