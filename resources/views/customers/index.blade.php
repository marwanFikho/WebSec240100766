@extends('layouts.app')

@section('content')
<h3 class="mb-3">Customers</h3>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Credit</th>
        <th>Add Credit</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>${{ number_format($customer->credit, 2) }}</td>
            <td>
                <form method="POST" action="{{ route('customers.credit', $customer) }}" class="d-flex gap-2">
                    @csrf
                    @method('PATCH')
                    <input type="number" step="0.01" min="0.01" name="amount" class="form-control" placeholder="Amount" required>
                    <button class="btn btn-sm btn-primary" type="submit">Add</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No customers found.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $customers->links() }}
@endsection
