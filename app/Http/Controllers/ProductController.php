<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index()
    {
       
        $products = Product::with('suppliers')->get();

        
        return view('products.index', compact('products'));
    }

    
    public function create()
    {
        return view('products.create');
    }

   
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'product_code' => 'required|unique:products,product_code',
            'product_name' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

       
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'New product created successfully! 🚀');
    }
}