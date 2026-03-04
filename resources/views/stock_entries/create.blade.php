@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h3 class="mb-0">Add New Stock</h3>
            </div>
            <div class="card-body">
                
                <form action="{{ route('stock.store') }}" method="POST">
                    @csrf 

                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Product</label>
                        <select name="product_id" class="form-select" required>
                            <option value="">-- Choose Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->product_name }} (Current: {{ $product->current_stock }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Supplier</label>
                        <select name="supplier_id" class="form-select" required>
                            <option value="">-- Choose Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Quantity</label>
                        <input type="number" name="quantity" class="form-control" min="1" placeholder="e.g. 50" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Delivery Reference</label>
                        <input type="text" name="delivery_reference" class="form-control" placeholder="e.g. DEL-001" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Save Stock Entry</button>
                        <a href="{{ url('/products') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection