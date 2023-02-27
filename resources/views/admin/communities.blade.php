@extends('layouts.admin')

@section('title', __('admin.snippets'))

@section('content')

    <div class="container my-2">
        <table class="table table-light table-striped rounded-1">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Role</th>
                    <th scope="col">E-Mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($snippets as $snippet)
                    <tr>
                        <th scope="col">{{ $snippet->id }}</th>
                        <td>{{ $snippet->title }}</td>
                        <td>{{ $snippet-> }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-black">
            {{ $snippets->links() }}
        </div>
    </div>

@endsection