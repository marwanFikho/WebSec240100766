@extends('layouts.app')

@section('content')
<h3 class="mb-3">Edit Product</h3>
<form method="POST" action="{{ route('staff.products.update', $product) }}">
    @csrf
    @method('PUT')
    @include('products.form', ['product' => $product])
</form>
@endsection
