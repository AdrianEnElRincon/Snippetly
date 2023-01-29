@extends('layouts.app')

@section('title', __('app.title'))

@section('content')

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
    <div class="container">
        <div class="row">
            <div class="col-auto m-auto">
                <pre>
                    <code class="language-cpp rounded-2">// {{ __('welcome.message') }}</code>
                </pre>
            </div>
            <form action="" class="col mt-4" >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ __('form.search') }}">
                    <input type="submit" class="btn btn-outline-light" value="{{ __('ui.search') }}">
                </div>
            </form>
        </div>
    </div>

    @vite(['resources/js/highlight.js'])
@endsection

