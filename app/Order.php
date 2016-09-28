<?php

namespace App;

use Eloquent;

class Order extends Cart
{
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
