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

    public function getTotalAttribute()
    {
        $total = $this->items()->sum('price');
        return $total ? $total : 0;
    }

    public function getTotalFormated($prefix = 'R$')
    {
        return ($prefix !== null ? $prefix . " " : '') . number_format($this->total, 2, ',', '.');
    }
}
