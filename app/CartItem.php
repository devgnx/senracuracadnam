<?php

namespace App;

use Eloquent;

class CartItem extends Eloquent
{
    protected $fillable = ["name", "price", "quantity"];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPriceAttribute()
    {
        if (!empty($this->attributes['price'])) {
            $price = (float) $this->attributes['price'];
        } else {
            $price = 0;
        }

        return number_format($price, 2, ',', '.');
    }

    public function getPrefixedPriceAttribute() {
        return "R$ " . $this->getPriceAttribute();
    }
}
