@extends('layouts.app')

@section('title', __('profiles.show'))

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col">
                <h1>{{ $profile->user->name }}</h1>
                <p class="text-white-50">
                    <span class="badge bg-secondary">{{ $profile->user->role->name }}</span>
                    <span>{{ $profile->user->email }}</span>
                </p>
            </div>
            @if ($profile->user_id === auth()->user()->id)
                <div class="col d-flex justify-content-end align-items-center p-2 gap-2">
                    <div>
                        <a class="btn btn-warning" href="{{ route('profiles.edit', $profile) }}">
                            <span class="bi bi-pencil"></span>
                            <span>{{ __('profiles.edit') }}</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <p class="text-white-50">{{ __('profiles.member-since', date_dmy_array($profile->user->created_at)) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><span>{{ __('profiles.style') }}:</span>&nbsp;<span>{{ $profile->style }}</span></p>
            </div>
        </div>
        <x-snippets-preview :snippets="$profile->user->snippets" :styles="$profile->style"/>
    </div>
@endsection
