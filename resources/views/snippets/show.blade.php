@extends('layouts.app')

@section('title', __('snippets.show'))

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/snippets/show.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ hljs()->asset($snippet->user->profile->style) }}">
@endpush

@section('content')

    <div class="container mt-4">

        <div class="row justify-content-between">
            <div class="col">
                <h1>{{ $snippet->title }}</h1>
            </div>
            @if ($snippet->user_id === auth()->user()->id)
                <div class="col d-flex justify-content-end p-2 gap-2">
                    <a class="btn btn-warning " href="{{ route('snippets.edit', $snippet) }}">
                        <span class="bi bi-pencil"></span>
                        <span>{{ __('snippets.edit') }}</span>
                    </a>
                    <form action="{{ route('snippets.destroy', $snippet) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">
                            <span class="bi bi-trash3"></span>
                            <span>{{ __('snippets.delete') }}</span>
                        </button>
                    </form>
                </div>
            @endif
        </div>
        <p>{{ $snippet->description }}</p>


        <div class="my-5">
            <pre><code class="language-{{ $snippet->lang->name }}">{{ $snippet->content }}</code></pre>
        </div>

        <div id="comment-section"></div>

        <h5>{{ __('ui.comments') }}</h5>

        <hr class="hr">

        @auth
            <div class="row">
                <div class="col">
                    <form id="form-store-comment" action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="snippet_id" value="{{ $snippet->id }}">
                        <div>
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="form-store-comment-content">
                                    {{ __('ui.make-comment') }}
                                </label>
                                <textarea class="form-control p-3" id="form-store-comment-content" name="content" rows="4"></textarea>
                                <div class="mt-3">
                                    <input class="btn btn-success" type="submit"
                                        value="{{ __('ui.save') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card">
                <h5 class="card-header">Register To Post Comments</h5>
                <div class="card-body">
                    <h3>Looks like you are not logged in</h3>
                    <p class="card-text">To post comments on snippets begin by creating a new account,
                        follow this link and begin your journey.</p>
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                </div>
            </div>
        @endauth

        <div class="row">
            <div class="col nav">
                <ul class="d-flex list-unstyled text-decoration-none">
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'disabled' =>
                                request()->sortBy === 'popular' ||
                                !in_array(request()->sortBy, ['popular', 'controversial', 'recent']),
                        ])
                            href="{{ route('snippets.show', $snippet) }}?sortBy=popular#comment-section">{{ __('ui.popular') }}</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'disabled' => request()->sortBy === 'controversial',
                        ])
                            href="{{ route('snippets.show', $snippet) }}?sortBy=controversial#comment-section">{{ __('ui.controversial') }}</a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'disabled' => request()->sortBy === 'recent'])
                            href="{{ route('snippets.show', $snippet) }}?sortBy=recent#comment-section">{{ __('ui.recent') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <ul class="list-group border-dark-subtle">
                    @foreach ($comments as $comment)
                        <li class="list-group-item border-0 bg-transparent">
                            <div class="card">
                                <div class="card-body">

                                    <p class="card-text">{{ $comment->content }}</p>

                                    <div class="card-footer hstack gap-2">
                                        <div>
                                            <span>{{ $comment->likes }}</span>
                                            <a class="text-decoration-none text-success fw-semibold"
                                                href="{{ route('comments.like', $comment) }}">{{ __('ui.likes') }}</a>
                                        </div>

                                        <div>
                                            <span>{{ $comment->dislikes }}</span>
                                            <a class="text-decoration-none text-danger fw-semibold"
                                                href="{{ route('comments.dislike', $comment) }}">{{ __('ui.dislikes') }}</a>
                                        </div>


                                        @if ($comment->user->public)
                                            <div>
                                                <span class="text-white-50 px-1">u/</span>
                                                <a class="text-decoration-none text-reset fw-semibold"
                                                    href="{{ route('profiles.show', $comment->user) }}">{{ $comment->user->name }}</a>
                                            </div>
                                        @else
                                            <span
                                                class="text-white-50 px-1">u/</span><span>{{ $comment->user->name }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
