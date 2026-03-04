<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Supplier;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Dummy Suppliers
        // Supplier A
        $sup1 = Supplier::create([
            'supplier_code' => 'SUP-001',
            'supplier_name' => 'San Miguel Corp.',
            'contact_email' => 'sales@sanmiguel.com',
            'contact_number' => '0917-123-4567',
        ]);

        // Supplier B
        $sup2 = Supplier::create([
            'supplier_code' => 'SUP-002',
            'supplier_name' => 'Coca-Cola Beverages',
            'contact_email' => 'order@coke.com',
            'contact_number' => '0918-987-6543',
        ]);

        // Supplier C
        $sup3 = Supplier::create([
            'supplier_code' => 'SUP-003',
            'supplier_name' => 'Purefoods Hormel',
            'contact_email' => 'contact@purefoods.com',
            'contact_number' => '02-8888-9999',
        ]);

        // 2. Create Dummy Products
        // Product A
        $prod1 = Product::create([
            'product_code' => 'PROD-001',
            'product_name' => 'San Mig Light (Can)',
            'price' => 65.00,
            'current_stock' => 0, // Start with 0 stock
        ]);

        // Product B
        $prod2 = Product::create([
            'product_code' => 'PROD-002',
            'product_name' => 'Coke Mismo',
            'price' => 20.00,
            'current_stock' => 0,
        ]);

        // Product C
        $prod3 = Product::create([
            'product_code' => 'PROD-003',
            'product_name' => 'Tender Juicy Hotdog (1kg)',
            'price' => 250.00,
            'current_stock' => 0,
        ]);

        // 3. Initial Stock Entry (Optional: Para dili zero ang stock)
        // Supplier 1 delivers 100 San Mig Light to Product 1
        $prod1->suppliers()->attach($sup1->id, [
            'quantity' => 100,
            'delivery_reference' => 'DEL-REF-001'
        ]);
        $prod1->increment('current_stock', 100);

        // Supplier 2 delivers 50 Coke to Product 2
        $prod2->suppliers()->attach($sup2->id, [
            'quantity' => 50,
            'delivery_reference' => 'DEL-REF-002'
        ]);
        $prod2->increment('current_stock', 50);
    }
}