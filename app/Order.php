<?php

namespace App;

use Eloquent;
use App\Enum\StatusEnum;

class Order extends Cart
{
    protected $table = 'orders';

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeUndelivered($query)
    {
        return $query->where('delivered', StatusEnum::UNDELIVERED);
    }

    public function scopeDelivered($query)
    {
        return $query->where('delivered', StatusEnum::DELIVERED);
    }
}
