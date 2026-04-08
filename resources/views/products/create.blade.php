@extends('layouts.app')

@section('content')
<h3 class="mb-3">Create Product</h3>
<form method="POST" action="{{ route('staff.products.store') }}">
    @csrf
    @include('products.form', ['product' => null])
</form>
@endsection
