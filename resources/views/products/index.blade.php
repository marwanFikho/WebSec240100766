@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Products</h3>
    <a href="{{ route('staff.products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('staff.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('staff.products.destroy', $product) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No products found.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection
