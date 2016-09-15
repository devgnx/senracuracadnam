<?php

namespace App;

use Eloquent;

class CartItem extends Eloquent
{
    //protected $table = "cart_items";
    protected $fillable = ["name", "price", "quantity"];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
