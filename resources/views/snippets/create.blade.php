@extends('layouts.app')

@section('title', __('snippets.create'))

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/snippets/editor.js') }}"></script>
    <script type="module" src="{{ Vite::asset('resources/js/tooltips.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/editor.css') }}">
@endpush

@section('content')
    <div class="container my-3 rounded">
        @error('content')
            <div class="alert alert-danger">
                {{ __('snippets.validation.required-content') }}
            </div>
        @enderror
        <form class="form needs-validation" action="{{ route('snippets.store') }}" method="post"
            novalidate>
            @csrf
            <div class="row">
                <div class="col">
                    <div class="row g-2">
                        <div class="col position-relative mx-0">
                            <input class="form-control border-0 @error('title') is-invalid @enderror"
                                type="text" name="title"
                                placeholder="{{ __('snippets.create-form.title') }}"
                                @error('title')
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="validation-tooltip"
                                    data-bs-title="{{ __('validation.required', __('snippets.validation.required-title')) }}"
                                @enderror>
                        </div>
                        <div class="col position-relative mx-0">
                            <select class="form-select border-0 @error('language') is-invalid @enderror"
                                id="language-select" aria-label="Default select example"
                                name="language"
                                @error('language')
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="validation-tooltip"
                                    data-bs-title="{{ __('validation.required', __('snippets.validation.required-language')) }}"
                                @enderror>
                                <option selected disabled hidden value="plaintext">
                                    {{ __('snippets.create-form.select-lang') }}
                                </option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->name }}">{{ $language->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <textarea class="form-control border-0 @error('description') is-invalid @enderror"
                                id="" name="description" cols="30" rows="4"
                                placeholder="{{ __('snippets.create-form.description') }}" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <select
                                class="form-select border-0 @error('community_id') is-invalid @enderror"
                                id="" name="community_id">
                                <option selected default value="">
                                    {{ __('snippets.create-form.no-community') }}</option>
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}">{{ $community->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="my-2" id="editor"></div>
                    <input type="hidden" name="content">
                    <input class="btn btn-success" type="submit" value="{{ __('ui.save') }}">
                </div>
            </div>
        </form>
    </div>

@endsection
