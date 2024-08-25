<div @class([
    'md:absolute md:bottom-0 md:left-0 md:right-0 md:px-10 md:py-10' =>
        $items->count() <= $count,
])>
    {{ $items->links() }}
</div>
