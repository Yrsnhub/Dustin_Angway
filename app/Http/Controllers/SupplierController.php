<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier; 

class SupplierController extends Controller
{
   
    public function index()
    {
        $suppliers = Supplier::all(); 
        return view('suppliers.index', compact('suppliers')); 
    }

    
    public function show($id)
    {
       
        $supplier = Supplier::with('products')->findOrFail($id);

        return view('suppliers.show', compact('supplier'));
    }

    
    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_code' => 'required|unique:suppliers,supplier_code',
            'supplier_name' => 'required',
            'contact_email' => 'required|email|unique:suppliers,contact_email',
            'contact_number' => 'required',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'New supplier added! 🚚');
    }
}