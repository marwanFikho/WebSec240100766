@extends('layouts.app')

@section('content')
<h3 class="mb-3">Edit User</h3>
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')
    @include('admin.users.form', ['user' => $user])
</form>
@endsection
