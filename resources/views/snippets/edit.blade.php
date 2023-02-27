@extends('layouts.app')

@section('title', __('snippets.edit'))

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
        <form class="form" action="{{ route('snippets.update', $snippet) }}" method="post">
            @csrf
            @method('put')
            <div class="row g-2">
                <div class="col position-relative">
                    <input class="form-control border-0 @error('title') is-invalid @enderror"
                        type="text" name="title"
                        placeholder="{{ __('snippets.create-form.title') }}"
                        value="{{ old('title', $snippet) }}"
                        @error('title')
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="validation-tooltip"
                        data-bs-title="{{ __('validation.required', __('snippets.validation.required-title')) }}"
                    @enderror>
                </div>
                <div class="col position-relative">
                    <select class="form-select border-0 @error('language') is-invalid @enderror"
                        id="language-select" aria-label="Default select example" name="language"
                        @error('language')
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="validation-tooltip"
                            data-bs-title="{{ __('validation.required', __('snippets.validation.required-language')) }}"
                        @enderror>
                        @foreach ($languages as $language)
                            <option value="{{ $language->name }}"
                                @if (old('language') !== null) @if (old('language') === $language->name) selected @endif
                            @else @if ($snippet->lang->name == $language->name) selected @endif @endif>
                                {{ $language->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @php
                if (old('description') !== $snippet->description) {
                    $description = old('description');
                }
            @endphp
            <textarea class="form-control mt-2 border-0" id="" name="description" cols="30"
                rows="5" placeholder="{{ __('snippets.create-form.description') }}" style="resize: none">{{ old('description', $snippet) }}</textarea>
            <div class="my-2" id="editor" data-old-content="{{ $snippet->content }}"></div>
            <input type="hidden" name="content" value="{{ $snippet->content }}">
            <input class="btn btn-success" type="submit" value="{{ __('ui.save') }}">
        </form>
    </div>

@endsection
