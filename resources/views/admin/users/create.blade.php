@extends('layouts.app')

@section('content')
<h3 class="mb-3">Create User</h3>
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    @include('admin.users.form', ['user' => null])
</form>
@endsection
