@push('styles')
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/jump-to-top.css') }}">
@endpush

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/jump-to-top.js') }}"></script>
@endpush

<div id="jump-to-top">
    <button class="btn btn-primary">
        <span class="bi bi-chevron-up"></span>
    </button>
</div>
