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
                {{ __('ui.register') }}
            </div>
            <div class="card-body">
                <h3>{{ __('app.register-card.title') }}</h3>
                <p>{{ __('app.register-card.description') }}</p>
                <a class="btn btn-primary" href="{{ route('register') }}">{{ __('ui.register') }}</a>
            </div>
        </div>
    </div>
@else
    <div class="container mt-4 home-shortcuts">
        <div class="row">
            <div class="col-4">
                <div class="card bg-transparent h-100">
                    <div class="card-header">
                        {{ __('snippets.create') }}
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3>{{ __('snippets.create-card.title') }}</h3>
                        <p>{{ __('snippets.create-card.description') }}</p>
                        <a class="btn btn-primary mt-auto" href="{{ route('snippets.create') }}">{{ __('snippets.create') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-transparent h-100">
                    <div class="card-header">
                        {{ __('communities.create') }}
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3>{{ __('communities.create-card.title') }}</h3>
                        <p>{{ __('communities.create-card.description') }}</p>
                        <a class="btn btn-primary mt-auto" href="{{ route('communities.create') }}">{{ __('communities.create') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-transparent h-100">
                    <div class="card-header">
                        {{ __('profiles.edit') }}
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3>{{ __('profiles.edit-card.title') }}</h3>
                        <p>{{ __('profiles.edit-card.description') }}</p>
                        <a class="btn btn-primary mt-auto" href="{{ route('profiles.edit', auth()->user()->profile) }}">{{ __('profiles.edit') }}</a>
                    </div>
                </div>
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
