<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = []; 

    public function suppliers()
    {
        
        return $this->belongsToMany(Supplier::class, 'stock_entries')
                    ->withPivot('quantity', 'delivery_reference')
                    ->withTimestamps();
    }
}
