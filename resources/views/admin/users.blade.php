@extends('layouts.admin')

@section('title', __('admin.users'))

@section('content')

    <div class="container my-2">
        <table class="table table-light table-striped rounded-1">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">E-Mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="col">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ roles()->fromId($user->role_id)->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-black">
            {{ $users->links() }}
        </div>
    </div>

@endsection