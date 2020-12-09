<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['checkout_id', 'product_id', 'cost', 'quantity'];

    public function checkout(){
        return $this->belongsTo(Checkout::class);
    }
    public function product(){
    return $this->belongsTo(Product::class);
}
}
