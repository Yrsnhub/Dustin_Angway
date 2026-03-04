@extends('layout')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>📦 Product List</h1>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                + Create Product
            </a>
            
            <a href="{{ route('stock.create') }}" class="btn btn-success ms-2">
                + Add Stock
            </a>
        </div>
    </div>

    <div class="card shadow-sm p-3">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Current Stock</th>
                    <th>Price</th>
                    <th>Suppliers</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td class="fw-bold">{{ $product->product_name }}</td>
                        <td>
                            @if($product->current_stock == 0)
                                <span class="badge bg-danger">Out of Stock</span>
                            @else
                                <span class="badge bg-success">{{ $product->current_stock }} pcs</span>
                            @endif
                        </td>
                        <td>₱{{ number_format($product->price, 2) }}</td>
                        <td>
                            @forelse($product->suppliers as $supplier)
                                <span class="badge bg-secondary">{{ $supplier->supplier_name }}</span>
                            @empty
                                <span class="text-muted small">No supplier yet</span>
                            @endforelse
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">
                            <i>No products found. Click "Create Product" to start!</i>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection