@extends('layouts.app')

@section('content')

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/snippets/show.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ hljs()->asset('github-dark') }}">
@endpush

<div class="container">

    <h1>{{ $snippet->title }}</h1>
    <p>{{ $snippet->description }}</p>

    <pre><code class="language-{{ $snippet->lang->name }}">{{ $snippet->content }}</code></pre>
</div>

@endsection