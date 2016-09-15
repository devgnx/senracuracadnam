<?php

namespace App;

use Eloquent;

class Cart extends Eloquent
{
    protected $table = "cart";
    protected $fillable = ["name", "telephone", "address", "total"];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
