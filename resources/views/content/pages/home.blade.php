@extends("app")

@section("title", "Home page")

@section("layout")
    <div id="home-page">

        @include('content.pages.partials.auth-header')

        <header>

        </header>

    </div>
@endsection

@push('head.styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush
