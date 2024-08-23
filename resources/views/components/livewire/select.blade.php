<div class="flex items-center w-full max-w-xs gap-2">
    <select class="w-full max-w-xs select input-bordered" data-filter="{{ $filter }}" x-on:change="handleSelect">
        <option disabled selected value="">{{ $label }}</option>
        @foreach ($data as $key => $item)
            <option value="{{ $key }}">{{ $item }}</option>
        @endforeach
    </select>
    <div x-on:click="clearFilter" class="btn btn-sm btn-circle btn-ghost">
        <x-heroicon-o-x-mark class="w-6 h-6 text-red-500 cursor-pointer" />
    </div>
</div>
