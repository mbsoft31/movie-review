@extends("app")

@section("title",$movie->title)
@section("layout")
<div class="single-movie">

    <header class="main-header relative h-128 bg-cover" style="background-image: url('{{ $movie->getMedia('cover')->first()->getFullUrl() }}')">
        <div class="absolute inset-0 flex items-center justify-center">
            <main-header-play-trailer-icon video-id="{{ $movie->getMedia('trailer')->first()->getCustomProperty('url') }}"></main-header-play-trailer-icon>
        </div>
    </header>

    <main class="bg-white container pt-12 mt-20">
        <div class="flex flex-wrap -px-4">
            <div class="md:w-1/4 px-4">
                {{ $movie->getMedia('poster')->first() }}
            </div>
            <div class="flex flex-col md:w-3/4 -px-4 px-4">
                <h1 class="entry-title px-4">{{ $movie->title }}</h1>
                <div class="flex flex-wrap -px-4">
                    <div class="review-info md:w-1/2 w-full px-4">
                        <div class="pb-2">
                            <h3>Director</h3>
                            <div>
                                <ul>
                                    @forelse($movie->directors as $person)
                                    <li>{{ $person->name }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="pb-2">
                            <h3>Genre</h3>
                            <div>
                                <ul>
                                    @forelse($movie->categories as $person)
                                        <li>{{ $person->name }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="pb-2">
                            <h3>Stars</h3>
                            <div>
                                <ul>
                                    @forelse($movie->stars as $person)
                                        <li>{{ $person->name }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="pb-2">
                            <h3>Writer</h3>
                            <div>
                                <ul>
                                    @forelse($movie->writers as $person)
                                        <li>{{ $person->name }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="pb-2">
                            <h3>Producer</h3>
                            <div>
                                <ul>
                                    @forelse($movie->producers as $person)
                                        <li>{{ $person->name }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="pb-2">
                            <h3>Runtime</h3>
                            <div>
                                <span>{{ $movie->runtime }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="review-info md:w-1/2 w-full px-4">
                        <div class="pb-2">
                            <h3>Release date</h3>
                            <div>
                                <span class="">{{ $movie->getReleased() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t border-b-2 border-primary mt-8">
                    <p class="text-lg text-justify tracking-wide leading-relaxed py-8">{{ $movie->summary }}</p>
                </div>
            </div>
        </div>
        <div class="md:px-32">
            <tabs :options="{ useUrlFragment: true }">
                <tab name="Site's review">
                    @include('content.movie.partials.site-review', ['movie' => $movie])
                </tab>
                <tab name="Users review">
                    @include('content.movie.partials.users-review', ['movie' => $movie])
                </tab>
                <tab name="Gallery">
                    @include('content.movie.partials.gallery', ['movie' => $movie])
                </tab>
                <tab name="Videos">
                    @include('content.movie.partials.videos', ['movie' => $movie])
                </tab>
                <tab name="News" :is-disabled="true">
                    Third tab content
                </tab>
            </tabs>
        </div>

    </main>

    <footer class="site-footer">
        @include('content.movie.partials.footer.site-info')
    </footer>
</div>
@endsection

@push('head.styles')
    <link rel="stylesheet" href="{{ asset("css/movie-single.css") }}">
@endpush
