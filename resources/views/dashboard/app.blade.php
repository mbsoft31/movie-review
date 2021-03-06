<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fooshar') }} | @yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/dashboard/app.js') }}" defer></script>
    @stack('head.scripts')
    <!-- Styles -->
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @stack('head.styles')
</head>
<body>

<div id="app">

    @yield('layout')

</div>

@stack('modals')
@stack('footer.scripts')
</body>
</html>
