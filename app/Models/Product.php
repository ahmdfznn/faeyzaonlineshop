<?php

namespace App\Models;

use App\Models\ShoppingCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class);
    }
}
