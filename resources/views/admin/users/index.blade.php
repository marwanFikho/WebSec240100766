@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Users</h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Credit</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>${{ number_format($user->credit, 2) }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No users found.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $users->links() }}
@endsection
