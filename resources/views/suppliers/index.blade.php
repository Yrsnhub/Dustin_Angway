@extends('layout')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Supplier List</h1>
        <a href="{{ route('suppliers.create') }}" class="btn btn-success">
            + Add New Supplier
        </a>
    </div>

    <div class="card shadow-sm p-3">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Supplier Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                    <tr>
                        <td class="fw-bold text-primary">
                            {{ $supplier->supplier_name }}
                        </td>
                        <td>
                            <span class="text-muted">{{ $supplier->contact_email }}</span>
                        </td>
                        <td>
                            <span class="text-muted">{{ $supplier->contact_number }}</span>
                        </td>
                        <td>
                            <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-outline-primary">
                                View Profile
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted p-4">
                            <i>No suppliers found. Click "Add New Supplier" to start!</i>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection