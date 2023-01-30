<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <x-app-logo type="brand"></x-app-logo>
        </a>
        <div class="d-flex">
            <x-lang-switch class="me-2" />
            <form class="me-2" action="">
                <div class="input-group">
                    <input class="form-control text-white" type="text" name="searchtext"
                        autocomplete="off" placeholder="{{ __('snippets.search') }}">
                    <input class="btn btn-outline-secondary" type="submit"
                        value="{{ __('ui.search') }}">
                </div>
            </form>
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="btn btn-danger me-0" type="submit" value="{{ __('auth.logout') }}">
                </form>
            @else
                <a class="btn btn-success me-2" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                <a class="btn btn-secondary"
                    href="{{ route('register') }}">{{ __('auth.register') }}</a>
            @endauth
        </div>
    </div>
    @auth
        <button id="toggle-sidebar-menu" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
            <span class="bi bi-layout-sidebar" ></span>
        </button>
    @endauth
</nav>

@auth
    <div class="offcanvas offcanvas-start" id="sidebarMenu" data-bs-scroll="true" tabindex="-1"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-center" id="sidebarMenuLabel">{{ __('ui.menu') }}</h5>
            <button class="btn-close-white btn-lg" data-bs-dismiss="offcanvas" type="button"
                aria-label="Close"></button>
        </div>
        <div>
            <div class="bi bi-code-slash text-center fs-1 text-danger"></div>
            <hr class="hr">
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column gap-3">
                <li class="d-grid">
                    <a class="btn btn-danger" href="#">
                        <span class="bi bi-plus"></span>
                        <span>{{ __('snippets.create') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-danger" href="#">
                        <span class="bi bi-eye-fill"></span>
                        <span>{{ __('snippets.show') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-danger" href="#">
                        <span class="bi bi-search"></span>
                        <span>{{ __('snippets.discover') }}</span>
                    </a>
                </li>
                <div>
                    <div class="bi bi-people-fill text-center fs-1 text-primary"></div>
                    <hr class="hr">
                </div>
                <li class="d-grid">
                    <a class="btn btn-primary" href="#">
                        <span class="bi bi-plus"></span>
                        <span>{{ __('snippets.comunity.create') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-primary" href="#">
                        <span class="bi bi-eye-fill"></span>
                        <span>{{ __('snippets.comunity.show') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-primary" href="#">
                        <span class="bi bi-search"></span>
                        <span>{{ __('snippets.comunity.search') }}</span>
                    </a>
                </li>
                <div>
                    <div class="bi bi-person-circle text-center fs-1 text-secondary"></div>
                    <hr class="hr">
                </div>
                <li class="d-grid">
                    <a class="btn btn-secondary" href="#">
                        <span class="bi bi-pencil"></span>
                        <span>{{ __('ui.profile.edit') }}</span>
                    </a>
                </li>
                <li class="d-grid">
                    <a class="btn btn-secondary" href="#">
                        <span class="bi bi-gear"></span>
                        <span>{{ __('ui.profile.config') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endauth
