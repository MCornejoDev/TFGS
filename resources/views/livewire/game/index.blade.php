<div class="space-y-4">
    <div @class([
        'grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4' =>
            $this->games->count() > 0,
        'grid grid-cols-1 gap-4 justify-items-center font-bold' =>
            $this->games->count() === 0,
    ])>
        @forelse ($this->games as $game)
            <p>{{ $game->name }}</p>
        @empty
        @endforelse
    </div>
</div>
