@extends('layouts.app')

@guest
    @section('title', __('app.title'))
@else
    @section('title', config('app.name'))
@endguest


@push('styles')
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/home.css') }}">
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
                <p>Para usar el editor de snippets y crear maravillosos fragmentos de codigo hace falta
                    que te crees una cuenta, registrate y podras usar toda la apiclacion</p>
                <a class="btn btn-primary" href="{{ route('register') }}">Registrate!</a>
            </div>
        </div>
    </div>
@endguest

<div class="container mt-5">
    <h2 class="text-white text-center">{{ __('snippets.popular') }}</h2>
</div>

<x-top-snippets />

<x-jump-to-top />

@endsection
