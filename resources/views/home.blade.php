@extends('layouts.app')


@section('title', __('app.title'))


@push('styles')
    @livewireStyles

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/home.css') }}">
@endpush


@push('scripts')
    @livewireScripts

    <script type="module" src="{{ Vite::asset('resources/js/home.js') }}"></script>
@endpush

@section('content')

    <livewire:search-bar />

    <x-top-snippets />

    <x-jump-to-top />

@endsection
