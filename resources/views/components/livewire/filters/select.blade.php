<div class="flex items-center gap-2">
    <div class="flex items-center w-full max-w-xs gap-2">
        <select class="w-full max-w-xs font-bold rounded select input-bordered" data-filter="{{ $filter }}"
            x-on:change="handleSelect">
            <option disabled selected value="" class="font-bold rounded">{{ $label }}</option>
            @foreach ($data as $key => $item)
                <option value="{{ $key }}" class="font-bold rounded">{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <x-mini-button negative icon="x-mark" flat x-on:click="clearFilter('{{ $filter }}')" />
</div>
