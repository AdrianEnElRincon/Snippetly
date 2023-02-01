<div class="container mt-4">
    <div class="row justify-content-center">
        <form class="col-8 position-relative" id="search-bar" action="">
            <div class="row">
                <div class="col input-group">
                    <input class="form-control text-white" wire:model="search" type="text"
                        name="searchtext" autocomplete="off" placeholder="{{ __('ui.searchbar') }}">
                    <input class="btn btn-outline-secondary" type="submit"
                        value="{{ __('ui.search') }}">
                </div>
            </div>
            <div class="row">
                <ul class="position-absolute w-100 col bg-body rounded mt-1 list-unstyled vstack gap-1 overflow-y-scroll"
                    id="search-bar-results" style="z-index: 2">
                    @foreach ($snippets as $snippet)
                        <li class="p-2 align-middle">
                            <span class="text-white-50 px-1">s/</span>
                            <a class="text-decoration-none text-reset fw-semibold"
                                href="{{ route('snippets.show', $snippet) }}">{{ $snippet->title }}</a>
                        </li>
                    @endforeach
                    @foreach ($users as $user)
                        @if ($user->public)
                            <li class="p-2 align-middle">
                                <span class="text-white-50 px-1">u/</span>
                                <a class="text-decoration-none text-reset fw-semibold"
                                    href="{{ route('profiles.show', $user) }}">{{ $user->name }}</a>
                            </li>
                        @endif
                    @endforeach
                    @foreach ($communities as $community)
                        <li class="p-2 align-middle">
                            <span class="text-white-50 px-1">c/</span>
                            <a class="text-decoration-none text-reset fw-semibold"
                                href="{{ route('communities.show', $community) }}">{{ $community->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>
