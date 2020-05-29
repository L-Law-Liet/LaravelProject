<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $primaryKey = 'id';
    public $timestamps = true;

    function favourites(){
        return $this->belongsToMany(Product::class, 'favourites', 'uid', 'pid');
    }
}
