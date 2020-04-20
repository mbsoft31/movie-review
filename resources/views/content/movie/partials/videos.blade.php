<div class="grid lg:grid-cols-3 gap-4">
    @foreach($movie->getMedia('videos') as $item)
        {{--<div>
            <a target="_blank" href="{{ $item->getCustomProperty('url') }}">
                {{ $item }}
            </a>
        </div>--}}
        <movie-video-item url="{{ $item->getCustomProperty('url') }}">
            {{ $item }}
        </movie-video-item>
    @endforeach
</div>
