@extends('layouts.app')

@section('title', __('communities.create'))

@section('content')

    <div class="container">
        <div class="row">
            <form class="position-absolute top-50 start-50 translate-middle col-6"
                action="{{ route('communities.store') }}" method="POST">
                @csrf
                <div class="row">
                    <label class="form-label"
                        for="communities-name-input">{{ __('communities.create-form.name') }}</label>
                    <input class="form-control mb-3 @error('name') is-invalid @enderror "
                        id="communities-name-input" type="text" name="name">
                    <div id="communities-name-inputFeedback" class="invalid-feedback mb-3">
                        {{ __('validation.required', ['attribute' => __('communities.create-form.name')]) }}
                    </div>
                </div>
                <div class="row">
                    <label class="form-label"
                        for="communities-description-input">{{ __('communities.create-form.description') }}</label>
                    <textarea class="form-control mb-3" id="communities-description-input" name="description" rows="5"></textarea>
                </div>

                <div class="row">
                    <input class="btn btn-primary" type="submit" value="{{ __('ui.save') }}">
                </div>

            </form>
        </div>
    </div>

@endsection
