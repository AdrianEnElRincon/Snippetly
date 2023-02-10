@push('styles')
    @auth
        <link rel="stylesheet" href="{{ hljs()->asset(auth()->user()->profile->style) }}">
    @else
        <link rel="stylesheet" href="{{ hljs()->asset('atom-one-dark') }}">
    @endauth
@endpush

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/highlightAll.js') }}"></script>
@endpush

<div class="container mt-3">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="0">
        <defs>
            <filter id="svg-filter-blur">
                <feGaussianBlur stdDeviation="3" />
            </filter>
        </defs>
    </svg>
    <h5 class="text-white">{{ __('snippets.popular') }}</h5>
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
                        <a href="{{ route('snippets.show', $snippet) }}" style="text-decoration: none; color: darkgrey">
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
    <div class="modal" id="expand-snippet-modal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <i class="bi bi-arrows-angle-contract text-white fs-5" data-bs-dismiss="modal"
                        aria-label="Close" style="cursor: pointer"></i>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
</div>
