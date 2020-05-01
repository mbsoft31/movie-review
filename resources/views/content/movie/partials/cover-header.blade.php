@if($movie->getMedia('cover')->first() != null)
    <header class="main-header relative h-128 bg-cover"
            style="background-image: url('{{ $movie->getMedia('cover')->first()->getFullUrl() }}')">
        @else
            <header class="main-header relative h-128 bg-cover"
                    style="background-image: url('{{ asset("images/how-to-train-your-dragon/d-1.jpg") }}')">
                @endif
                <div class="absolute inset-0 flex items-center justify-center">
                    @if($movie->getMedia('trailer')->first() != null)
                        <main-header-play-trailer-icon
                            video-id="{{ $movie->getMedia('trailer')->first()->getCustomProperty('url') }}"></main-header-play-trailer-icon>
                    @endif
                </div>
            </header>
