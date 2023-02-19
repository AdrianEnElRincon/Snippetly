@extends('layouts.app')

@section('title', __('communities.create'))

@section('content')

<div class="container">
    <form class="position-absolute top-50 start-50 translate-middle w-auto row" action="{{ route('communities.store') }}" method="POST">
        <label class="form-label" for="communities-name-input">{{ __('communities.create-form.name') }}</label>
        <input id="communities-name-input" class="form-control mb-3" type="text" name="name">
        <label class="form-label" for="communities-description-input">{{ __('communities.create-form.description') }}</label>
        <textarea id="communities-description-input" class="form-control mb-3" name="description"></textarea>
        <input class="btn btn-primary" type="submit" value="{{ __('ui.save') }}">
    </form>
</div>

@endsection

