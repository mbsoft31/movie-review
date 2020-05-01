@extends('dashboard.app')

@section('title', 'Create new Movie')

@section('layout')
<div class="movie-create bg-gray-200">
    <div class="flex h-screen max-h-screen">

        {{-- Side bar partial --}}
        @include('dashboard.movie.partials.sidebar')

        <div class="w-full overflow-y-auto">
            <div class="flex">
                <div class="flex-grow flex flex-col items-stretch gap-4">

                    <div class="flex flex-col space-y-4">

                        <movie-create-cover-picture></movie-create-cover-picture>

                        <main class="bg-white container">
                            <div class="flex flex-row-reverse flex-wrap px-4 py-16">
                                <div class="h-96 md:w-1/4 px-4">
                                    <movie-create-poster></movie-create-poster>
                                </div>
                                <div class="flex flex-col md:w-3/4 -px-4 px-4">
                                    <movie-create-title></movie-create-title>

                                    <movie-create-details></movie-create-details>

                                    <movie-create-summary></movie-create-summary>
                                </div>
                            </div>

                            <div class="mb-16 px-4">

                                @include('dashboard.movie.partials.create.medias')

                            </div>
                        </main>

                    </div>

                </div>
            </div>
        </div>

        <button class="fab-save" @click="saveMovie">
            <i class="fas fa-save fa-lg"></i>
        </button>

    </div>
</div>
@endsection

@push('head.styles')
    <link rel="stylesheet" href="{{ asset("css/movie-create.css") }}">
    <link rel="stylesheet" href="{{ asset("css/vue-tagsinput.css") }}">
@endpush
