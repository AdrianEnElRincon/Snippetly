@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush

<form class="z-2 col-8 position-relative translate-middle-x start-50" id="search-bar" action="">
    <div class="row">
        <div class="col input-group p-0">
            <input class="form-control text-white text-bg-dark" wire:model="search" type="text" name="searchtext"
                autocomplete="off" placeholder="@auth {{ __('ui.searchbar') }} @else {{ __('ui.searchbar-guest') }} @endauth">
            <input class="btn btn-outline-secondary" type="submit" value="{{ __('ui.search') }}">
        </div>
    </div>
    <div class="row">
        @if (!empty($search))

            <ul class="position-absolute w-100 bg-body rounded mt-1 list-unstyled vstack gap-1"
                id="search-bar-results" style="z-index: 2">

                @auth
                    @if (!empty($communities))
                        @foreach ($communities as $community)
                            <li class="p-2 align-middle">
                                <span class="text-white-50 px-1">c/</span>
                                <a class="text-decoration-none text-reset fw-semibold"
                                    href="{{ route('communities.show', $community) }}">{{ $community->name }}</a>
                            </li>
                        @endforeach
                    @endif
                @endauth

                @if (!empty($snippets))
                    @foreach ($snippets as $snippet)
                        <li class="p-2 align-middle">
                            <span class="text-white-50 px-1">s/</span>
                            <a class="text-decoration-none text-reset fw-semibold"
                                href="{{ route('snippets.show', $snippet) }}">{{ $snippet->title }}</a>
                            <span class="text-white-50">{{ truncate($snippet->description, 80) }}</span>
                        </li>
                    @endforeach
                @endif

                @auth
                    @if (!empty($users))
                        @foreach ($users as $user)
                            @if ($user->public)
                                <li class="p-2 align-middle">
                                    <span class="text-white-50 px-1">u/</span>
                                    <a class="text-decoration-none text-reset fw-semibold"
                                        href="{{ route('profiles.show', $user) }}">{{ $user->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endauth

                @if (empty($communities) & empty($users) & empty($snippets))
                    <li>
                        <span>{{ __('ui.no-results') }}</span>
                    </li>
                @endif
            </ul>
        @endif
    </div>
</form>
