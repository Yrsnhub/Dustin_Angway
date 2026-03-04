@extends('layout')

@section('content')

    <div class="container">
        <div class="mb-4">
            <a href="{{ route('suppliers.index') }}" class="btn btn-outline-secondary">
                &larr; Back to Supplier List
            </a>
        </div>

        <div class="card shadow-sm mb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="card-title text-primary fw-bold mb-1">
                             {{ $supplier->supplier_name }}
                        </h2>
                        <span class="badge bg-secondary">Code: {{ $supplier->supplier_code ?? 'N/A' }}</span>
                    </div>
                    <div class="text-end">
                        <p class="mb-1"><strong>Email:</strong> {{ $supplier->contact_email }}</p>
                        <p class="mb-0"><strong>Contact:</strong> {{ $supplier->contact_number }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mb-3">Delivery History</h4>

        <div class="card shadow-sm p-3">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Product Delivered</th>
                        <th>Quantity</th>
                        <th>Reference No.</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($supplier->products as $product)
                        <tr>
                            <td class="fw-bold">{{ $product->product_name }}</td>
                            <td>
                                <span class="badge bg-success">+{{ $product->pivot->quantity }} pcs</span>
                            </td>
                            <td class="text-muted font-monospace">
                                #{{ $product->pivot->delivery_reference }}
                            </td>
                            <td class="text-muted small">
                                {{ $product->pivot->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted p-4">
                                <i>No deliveries recorded from this supplier yet.</i>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection