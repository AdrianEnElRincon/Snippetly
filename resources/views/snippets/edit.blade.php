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
        <form class="form" action="{{ route('snippets.update', $snippet) }}" method="post">
            @csrf
            @method('put')
            <input class="form-control border-0" type="text" name="title"
                placeholder="{{ __('snippets.create-form.title') }}" value="{{ $snippet->title }}">
            <textarea class="form-control mt-2 border-0" id="" name="description" cols="30"
                rows="10" placeholder="{{ __('snippets.create-form.description') }}" style="resize: none">{{ $snippet->description }}</textarea>
            <select class="form-select my-2 border-0" id="language-select"
                aria-label="Default select example" name="language">
                @foreach ($languages as $language)
                    <option value="{{ $language->name }}"
                        @if ($snippet->lang->name === $language->name) selected @endif>{{ $language->value }}
                    </option>
                @endforeach
            </select>
            <label class="form-label mt-2" for="editor">{{ __('snippets.editor') }}</label>
            <div class="position-relative">
                <textarea class="position-absolute z-2" id="editor" name="content">{{ $snippet->content }}</textarea>
                <pre><code class="hljs" id="render"></code></pre>
            </div>
            <input class="btn btn-success" type="submit" value="{{ __('ui.save') }}">
        </form>
    </div>

@endsection
