@extends("app")

@section("title",$movie->title)
@section("layout")
<div class="single-movie">

    @include('content.pages.partials.auth-header')

    @include('content.movie.partials.cover-header')

    <main class="bg-white container pt-12 mt-20">
        <div class="flex flex-row-reverse flex-wrap -px-4">

            @include('content.movie.partials.poster')

            @include('content.movie.partials.info')

        </div>
        <div class="md:px-32 my-16">
            <tabs :options="{ useUrlFragment: false }">
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
        <div class="h-88 bg-gray-600">
            <div class="footer-cols-4 container">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        @include('content.movie.partials.footer.site-info')
    </footer>
</div>
@endsection

@push('head.styles')
    <link rel="stylesheet" href="{{ asset("css/movie-single.css") }}">
@endpush
