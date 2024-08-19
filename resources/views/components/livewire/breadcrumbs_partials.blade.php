<div class="text-sm breadcrumbs">
    @unless ($breadcrumbs->isEmpty())
        <ul class="font-bold">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}">
                            <div class="breadcrumb-shadow">{{ $breadcrumb->title }}</div>
                        </a>
                    </li>
                @else
                    <li>
                        <div class="breadcrumb-shadow">{{ $breadcrumb->title }}</div>
                    </li>
                @endif
            @endforeach
        </ul>
    @endunless
</div>
