<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    @stack('styles')
</head>

<body>
    @include('components.loader')
    @include('components.navbar')
    @yield('content')
    @stack('scripts')
    <script src="{{ Vite::asset('resources/js/loader.js') }}"></script>
</body>

</html>
