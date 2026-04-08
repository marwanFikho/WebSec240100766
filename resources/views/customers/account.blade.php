@extends('layouts.app')

@section('content')
<h3>My Account</h3>
<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Credit Balance:</strong> ${{ number_format($user->credit, 2) }}</p>

<h4 class="mt-4">Purchased Products</h4>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($purchases as $purchase)
        <tr>
            <td>{{ $purchase->product?->name ?? 'Deleted product' }}</td>
            <td>{{ $purchase->quantity }}</td>
            <td>${{ number_format($purchase->total_price, 2) }}</td>
            <td>{{ $purchase->purchased_at?->format('Y-m-d H:i') }}</td>
        </tr>
    @empty
        <tr><td colspan="4">No purchases yet.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
