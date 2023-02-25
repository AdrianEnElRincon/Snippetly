@extends('layouts.app')

@section('title', __('communities.show'))

@section('content')
    <div class="container mt-4">
        <div class="row">
            <h1><span class="text-white-50 m-1">c/</span>{{ $community->name }}</h1>
            <p>{{ $community->description }}</p>
        </div>
        <x-snippets-preview :snippets="$snippets"/>
    </div>
@endsection