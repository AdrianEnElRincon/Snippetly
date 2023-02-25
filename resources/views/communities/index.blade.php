@extends('layouts.app')

@section('title', __('communities.show'))

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success" role="alert" data-bs-theme="dark">
                <span class="bi bi-check-circle-fill"></span>
                {{ session('success')}}
            </div>
        @endif
        <table class="table">
            <tbody>
                @foreach ($communities as $community)
                    <tr>
                        <td class="hstack justify-content-center gap-2">
                            <a class="row text-decoration-none text-white mt-3"
                                href="{{ route('communities.show', $community) }}">
                                <h4>{{ $community->name }}</h4>
                                <p class="text-white-50">{{ $community->description }}</p>
                            </a>
                            <a class="btn btn-danger ms-auto text-nowrap"
                                href="{{ route('communities.unsubscribe', $community) }}">{{ __('communities.unsubscribe') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
