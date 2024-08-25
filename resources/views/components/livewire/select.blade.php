<div class="flex items-center gap-2">
    <div class="flex items-center w-full max-w-xs gap-2">
        <select class="w-full max-w-xs select input-bordered" data-filter="{{ $filter }}" x-on:change="handleSelect">
            <option disabled selected value="">{{ $label }}</option>
            @foreach ($data as $key => $item)
                <option value="{{ $key }}">{{ $item }}</option>
            @endforeach
        </select>

    </div>
    <x-mini-button x-on:click="clearFilter" negative icon="x-mark" flat />
</div>
