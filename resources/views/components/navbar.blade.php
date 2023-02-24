<nav class="container-fluid pt-2 ps-0" data-bs-theme="dark">
    <div class="row">
        <div class="col-auto">
            <a href="{{ route('home') }}">
                @include('components.app-logo', ['type' => 'brand'])
            </a>
        </div>

        <div class="col">
            <livewire:search-bar />
        </div>

        <div class="col-auto">
            <div class="d-flex">

                @include('components.lang-switch')

                @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class="btn btn-danger me-0" type="submit" value="{{ __('ui.logout') }}">
                    </form>
                @else
                    <a class="btn btn-success me-2" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    <a class="btn btn-secondary"
                        href="{{ route('register') }}">{{ __('ui.register') }}</a>
                @endauth
            </div>
        </div>

    </div>
    @auth
        <button class="btn btn-primary" id="toggle-sidebar-menu" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">
            <span class="bi bi-layout-sidebar"></span>
        </button>
    @endauth
    @auth
        <div class="offcanvas offcanvas-start" id="sidebarMenu" data-bs-scroll="true" tabindex="-1"
            aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-center" id="sidebarMenuLabel">{{ __('ui.menu') }}</h5>
                <button class="btn-close-white btn-lg" data-bs-dismiss="offcanvas" type="button"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column gap-3">
                    <div>
                        <div class="bi bi-code-slash text-center fs-1 text-danger"></div>
                        <hr class="hr">
                    </div>
                    <li class="d-grid">
                        <a class="btn btn-danger" href="{{ route('snippets.create') }}">
                            <span class="bi bi-plus"></span>
                            <span>{{ __('snippets.create') }}</span>
                        </a>
                    </li>
                    <li class="d-grid">
                        <a class="btn btn-danger" href="{{ route('snippets.index') }}">
                            <span class="bi bi-eye-fill"></span>
                            <span>{{ __('snippets.show') }}</span>
                        </a>
                    </li>
                    <li class="d-grid">
                        <a class="btn btn-danger" href="{{ route('snippets.discover') }}">
                            <span class="bi bi-search"></span>
                            <span>{{ __('snippets.discover') }}</span>
                        </a>
                    </li>
                    <div>
                        <div class="bi bi-people-fill text-center fs-1 text-primary"></div>
                        <hr class="hr">
                    </div>
                    <li class="d-grid">
                        <a class="btn btn-primary" href="{{ route('communities.create') }}">
                            <span class="bi bi-plus"></span>
                            <span>{{ __('communities.create') }}</span>
                        </a>
                    </li>
                    <li class="d-grid">
                        <a class="btn btn-primary" href="{{ route('communities.index') }}">
                            <span class="bi bi-eye-fill"></span>
                            <span>{{ __('communities.show') }}</span>
                        </a>
                    </li>
                    <li class="d-grid">
                        <a class="btn btn-primary" href="{{ route('communities.discover') }}">
                            <span class="bi bi-search"></span>
                            <span>{{ __('communities.discover') }}</span>
                        </a>
                    </li>
                    <div>
                        <div class="bi bi-person-circle text-center fs-1 text-secondary"></div>
                        <hr class="hr">
                    </div>
                    <li class="d-grid">
                        <a class="btn btn-secondary"
                            href="{{ route('profiles.show', auth()->user()->profile) }}">
                            <span class="bi bi-person-circle"></span>
                            <span>{{ __('ui.profile.show') }}</span>
                        </a>
                    </li>
                    <li class="d-grid">
                        <a class="btn btn-secondary"
                            href="{{ route('profiles.edit', auth()->user()->profile) }}">
                            <span class="bi bi-pencil"></span>
                            <span>{{ __('ui.profile.edit') }}</span>
                        </a>
                    </li>
                    <li class="d-grid">
                        <a class="btn btn-secondary" href="{{ route('profiles.config') }}">
                            <span class="bi bi-gear"></span>
                            <span>{{ __('ui.profile.config') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            @can('access-admin-tasks')
                <div class="d-grid mt-auto mx-3 mb-3">
                    <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">
                        <span class="bi bi-shield-shaded"></span>
                        <span>{{ __('ui.admin') }}</span>
                    </a>
                </div>
            @endcan
        </div>
    @endauth
</nav>

