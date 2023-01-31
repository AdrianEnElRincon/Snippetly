<div class="container mt-4">
    <div class="row justify-content-center">
        <form class="col-8 position-relative" action="">
            <div class="input-group">
                <input wire:model="search" class="form-control text-white" type="text" name="searchtext" autocomplete="off"
                    placeholder="{{ __('ui.searchbar') }}">
                <input class="btn btn-outline-secondary" type="submit" value="{{ __('ui.search') }}">
            </div>
            <div class="position-absolute bg-body rounded" style="z-index: 999; width: inherit">
                <ul class="list-unstyled">
                    @foreach ($snippets as $snippet)
                        <li>{{ $snippet->title }}</li>
                    @endforeach
                    @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>