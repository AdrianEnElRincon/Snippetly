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

        <div class="my-5">
            <pre><code class="language-{{ $snippet->lang->name }}">{{ $snippet->content }}</code></pre>
        </div>

        <div id="comment-section"></div>

        <h5>{{ __('ui.comments') }}</h5>

        <hr class="hr">

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
                <ul class="list-group">
                    @foreach ($comments as $comment)
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">

                                    <p class="card-text">{{ $comment->content }}</p>

                                    <div class="card-footer hstack gap-2">
                                        <div>
                                            <span>{{ $comment->likes }}</span>
                                            <a class="text-decoration-none text-success fw-semibold"
                                                href="">{{ __('ui.likes') }}</a>
                                        </div>

                                        <div>
                                            <span>{{ $comment->dislikes }}</span>
                                            <a class="text-decoration-none text-danger fw-semibold"
                                                href="">{{ __('ui.dislikes') }}</a>
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
