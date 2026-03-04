@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Add New Supplier</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Supplier Code</label>
                        <input type="text" name="supplier_code" class="form-control" placeholder="e.g. SUP-005" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Supplier Name</label>
                        <input type="text" name="supplier_name" class="form-control" placeholder="e.g. Universal Robina" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="contact_email" class="form-control" placeholder="email@company.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" placeholder="0917-XXX-XXXX" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Save Supplier</button>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection