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

    public function calcTotal()
    {
        $total = 0;
        foreach ($this->items()->get() as $item) {
            $total += ($item->attributes['price'] * $item->attributes['quantity']);
        }

        return $this->attributes['total'] = $total;
    }

    public function getTotalAttribute()
    {
        return $this->calcTotal();
    }

    public function setTotalAttribute($do_not_set = null)
    {
        return $this->calcTotal();
    }

    public function getTotalFormated($prefix = 'R$')
    {
        return ($prefix !== null ? $prefix . " " : '') . number_format($this->calcTotal(), 2, ',', '.');
    }
}
