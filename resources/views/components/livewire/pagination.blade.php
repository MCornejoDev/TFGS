{{-- @class([
    'lg:absolute lg:bottom-0 lg:left-0 lg:right-0 lg:px-10 lg:py-10' =>
        $items->count() <= $count,
]) --}}
<div>
    {{ $items->links('livewire::daisyui', ['pageName' => $items->getPageName()]) }}
</div>
