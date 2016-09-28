<?php

namespace App;

use Eloquent;

class OrderItem extends CartItem
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
