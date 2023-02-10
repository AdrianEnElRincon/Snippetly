@extends('layouts.app')

@guest
    @section('title', __('app.title'))
@else
    @section('title', config('app.name'))
@endguest


@push('styles')
@livewireStyles

<link rel="stylesheet" href="{{ Vite::asset('resources/css/home.css') }}">
@endpush


@push('scripts')
@livewireScripts

<script type="module" src="{{ Vite::asset('resources/js/home.js') }}"></script>
@endpush

@section('content')

@guest
    <div class="container mt-4">
        <h1>{{ __('app.title') }}</h1>
        <div class="card bg-transparent">
            <div class="card-header">
                Registrate
            </div>
            <div class="card-body">
                <h3>Empieza a crear tus snippets registrandote en Snippetly!</h3>
                <p>Para usar el editor de snippets y crear maravillosos fragmentos de codigo hace falta que te crees una cuenta, registrate y podras usar toda la apiclacion</p>
                <a href="{{ route('register') }}" class="btn btn-primary">Registrate!</a>
            </div>
        </div>
    </div>
@endguest

<x-top-snippets />

<x-jump-to-top />

@endsection
