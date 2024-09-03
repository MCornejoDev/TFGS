@props(['label' => null, 'wireTarget' => 'loadRecords', 'colspan' => 1])

<tr wire:loading wire:target="{{ $wireTarget }}" wire:loading.class="!table-row">
    <td colspan="{{ $colspan }}" class="py-4 text-center">
        <div class="flex items-center justify-center gap-2">
            <span class="w-5 mr-2 loading loading-spinner"></span>
            <span>{{ $label }}</span>
        </div>
    </td>
</tr>
