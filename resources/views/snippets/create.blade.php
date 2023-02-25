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
    {{ $errors }}
    <div class="container my-5 rounded">
        <form class="form" action="{{ route('snippets.store') }}" method="post">
            @csrf
            <div class="col">
                <div class="row gap-2">
                    <input class="form-control border-0 col" type="text" name="title"
                        placeholder="{{ __('snippets.create-form.title') }}">
                    <select class="form-select border-0 col" id="language-select"
                        aria-label="Default select example" name="language">
                        <option selected disabled hidden value="plaintext">{{ __('snippets.create-form.select-lang') }}
                        </option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->name }}">{{ $language->value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <textarea class="form-control mt-2 border-0" id="" name="description" cols="30"
                        rows="4" placeholder="{{ __('snippets.create-form.description') }}" style="resize: none"></textarea>
                </div>
                <div class="row">
                    <select class="form-select border-0 mt-2" id="" name="community_id">
                        <option selected default value="">{{ __('snippets.create-form.no-community') }}</option>
                        @foreach ($communities as $community)
                            <option value="{{ $community->id }}">{{ $community->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label class="form-label mt-2" for="editor">{{ __('snippets.editor') }}</label>
            <div class="mb-3" id="editor"></div>
            <input type="hidden" name="content">
           {{--  <div class="position-relative">
                <textarea class="position-absolute z-2" id="editor" name="content"></textarea>
                <pre><code class="hljs" id="render"></code></pre>
            </div> --}}
            <input class="btn btn-success" type="submit" value="{{ __('ui.save') }}">
        </form>
    </div>

@endsection
