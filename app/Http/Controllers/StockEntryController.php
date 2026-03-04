<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;      
use App\Models\Supplier;     
use App\Http\Controllers\Controller; 

class StockEntryController extends Controller  
{

public function create()
{
    
    $products = Product::all();
    $suppliers = Supplier::all();

    return view('stock_entries.create', compact('products', 'suppliers'));
}
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'delivery_reference' => 'required|unique:stock_entries,delivery_reference',
        ]);

        
        $product = Product::find($validated['product_id']);
        
        $product->suppliers()->attach($validated['supplier_id'], [
            'quantity' => $validated['quantity'],
            'delivery_reference' => $validated['delivery_reference'],
        ]);

       
        $product->increment('current_stock', $validated['quantity']);

        return redirect()->back()->with('success', 'Stock added and inventory updated! Super slay!');
    }
}