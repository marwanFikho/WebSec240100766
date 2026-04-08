@extends('layouts.app')

@section('content')
<h3 class="mb-3">Available Products</h3>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Purchase</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>
                <form method="POST" action="{{ route('store.purchase', $product) }}" class="d-flex gap-2">
                    @csrf
                    <input type="number" name="quantity" min="1" max="{{ $product->stock_quantity }}" value="1" class="form-control" required>
                    <button class="btn btn-sm btn-success" type="submit">Buy</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No products in stock.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection
