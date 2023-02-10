@extends('layouts.app')

@section('title', __('snippets.show'))

@push('styles')
    <link rel="stylesheet" href="{{ hljs()->asset(auth()->user()->profile->style) }}">
@endpush

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/highlightAll.js') }}"></script>
@endpush

@section('content')
<div class="container">
        <h1 class="mt-4">{{ __('snippets.your-snippets') }}</h1>
        <div class="row row-cols-md-1 row-cols-xxl-2 mt-3">
            @foreach ($snippets as $snippet)
                <div class="col mb-4">
                    <div class="card bg-dark">
                        <div class="card-header text-white">
                            <div class="d-flex">
                                <span
                                    data-role="title">{{ $snippet->title . ' | ' . $snippet->lang->value }}</span>
                                <i class="bi bi-arrows-angle-expand ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#expand-snippet-modal" style="cursor: pointer"></i>
                            </div>
                        </div>
                        <div class="card-body overflow-hidden user-select-none" style="height: 20rem">
                            <a href="{{ route('snippets.show', $snippet) }}"
                                style="text-decoration: none; color: darkgrey">
                                <pre><code class="languague-{{ strtolower($snippet->lang->name) }} overflow-hidden">{{ $snippet->content }}</code></pre>
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $snippet->views . ' ' . __('ui.views') . ' | ' . $snippet->likes . ' ' . __('ui.likes') . ' | ' . $snippet->dislikes . ' ' . __('ui.dislikes') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
