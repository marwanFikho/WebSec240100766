@extends('layouts.app')

@section('content')
<div class="p-4 bg-light rounded">
    <h1 class="h3">Secure Online Product Store</h1>
    <p class="mb-3">Login or register to continue.</p>
    <a class="btn btn-primary me-2" href="{{ route('login') }}">Login</a>
    <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
</div>
@endsection