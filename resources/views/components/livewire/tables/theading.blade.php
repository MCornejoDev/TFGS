<div class="flex items-center justify-center gap-2 font-bold cursor-pointer text-md">
    {{ $label }}
    <x-icon name="chevron-up" class="w-5 h-5" x-show="sortDirection === 'asc' && sortField === '{{ $id }}'" />
    <x-icon name="chevron-down" class="w-5 h-5" x-show="sortDirection === 'desc' && sortField === '{{ $id }}'" />
</div>
