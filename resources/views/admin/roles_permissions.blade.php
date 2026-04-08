@extends('layouts.app')

@section('content')
<h3 class="mb-3">Roles and Permissions</h3>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Role</th>
        <th>Permissions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($matrix as $role => $permissions)
        <tr>
            <td class="text-capitalize">{{ $role }}</td>
            <td>{{ implode(', ', $permissions) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
