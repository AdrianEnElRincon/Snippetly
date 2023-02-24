<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', __('ui.admin'))</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/admin.css'])
    <script type="module" src="{{ Vite::asset('resources/js/loader.js') }}"></script>
</head>
<body>
    @include('components.admin-loader')
    @include('components.admin-navbar')
    @yield('content')
</body>
</html>