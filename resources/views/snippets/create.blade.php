@extends('layouts.app')

@section('title', __('snippets.create'))

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/snippets/editor.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ hljs()->asset(auth()->user()->profile->style) }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/editor.css') }}">
@endpush

@section('content')

    <div class="container my-5 rounded">
        <form action="{{ route('snippets.store') }}" method="post" class="form">
            @csrf
            <div class="col">
                <div class="row gap-2">
                    <input class="form-control border-0 col" type="text" name="title" placeholder="{{ __('snippets.create-form.title') }}">
                    <select class="form-select border-0 col" id="language-select" aria-label="Default select example" name="language">
                        <option selected disabled hidden>{{ __('snippets.create-form.select-lang') }}</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->name }}">{{ $language->value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <textarea class="form-control mt-2 border-0" name="description" id="" cols="30" rows="4" placeholder="{{ __('snippets.create-form.description') }}" style="resize: none"></textarea>
                </div>
            </div>
            <label for="editor" class="form-label mt-2">{{ __('snippets.editor') }}</label>
            <div class="position-relative">
                <textarea class="position-absolute z-2" id="editor" name="content"></textarea>
                <pre><code class="hljs" id="render"></code></pre>
            </div>
            <input class="btn btn-success" type="submit" value="{{ __('ui.save') }}">
        </form>
    </div>

@endsection
