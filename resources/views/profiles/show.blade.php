@extends('layouts.app')

@section('title', __('profile.show'))

@section('content')
    {{ $user->profile }}
@endsection