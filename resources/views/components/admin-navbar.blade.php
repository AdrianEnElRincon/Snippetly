<nav class="container-fluid pt-2 ps-0">
    <div class="row">
        <div class="col-auto">
            <a href="{{ route('admin.dashboard') }}">
                @include('components.app-logo', [
                    'type' => 'admin',
                    'color' => 'black',
                ])
            </a>
        </div>
        <div class="col-auto ms-auto">
            <div class="d-flex gap-2">
                @include('components.lang-switch')
                <a class="btn btn-info d-flex gap-1 align-center" href="{{ route('home') }}">
                    {{ __('admin.app-link') }}
                </a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="btn btn-danger me-0" type="submit" value="{{ __('ui.logout') }}">
                </form>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" id="toggle-sidebar-menu" data-bs-toggle="offcanvas"
        data-bs-target="#sidebarMenu">
        <span class="bi bi-layout-sidebar"></span>
    </button>
    <div class="offcanvas offcanvas-start text-bg-light" id="sidebarMenu" data-bs-scroll="true" tabindex="-1"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-center" id="sidebarMenuLabel">{{ __('ui.menu') }}</h5>
            <button class="btn-close-white btn-lg" data-bs-dismiss="offcanvas" type="button"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column gap-3">
                <li class="d-grid">
                    <a class="btn btn-outline-primary" href="{{ route('admin.snippets') }}">
                        <span class="bi bi-code-slash"></span>
                        <span>{{ __('admin.snippets') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-outline-primary" href="{{ route('admin.comments') }}">
                        <span class="bi bi-chat-fill"></span>
                        <span>{{ __('admin.comments') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-outline-primary" href="{{ route('admin.communities') }}">
                        <span class="bi-people-fill"></span>
                        <span>{{ __('admin.communities') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-outline-primary" href="{{ route('admin.users') }}">
                        <span class="bi bi-person-fill"></span>
                        <span>{{ __('admin.users') }}</span>
                    </a>
                </li>
            </ul>
        </div>
</nav>
