<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <x-app-logo type="brand" />
            </a>
            <div class="d-flex">
                <a class="btn btn-success me-2" href="#">{{ __('auth.login') }}</a>
                <a class="btn btn-secondary" href="#">{{ __('auth.register') }}</a>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
