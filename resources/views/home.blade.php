@extends('layouts.app')

@section('title', __('app.title'))

@section('scripts')
    <script type="module" src="{{ Vite::asset('resources/scripts/home.js') }}"></script>
@endsection

@section('loader')
    <x-loader />
@endsection

@section('content')

    @env('local')
        <x-bootstrap-breakpoints />
    @endenv

    <div class="container mt-3">
        <x-top-snippets />
    </div>

    <div id="jump-to-top">
        <a href="#top" class="btn btn-primary">
            <span class="bi bi-chevron-up"></span>
        </a>
    </div>
@endsection
