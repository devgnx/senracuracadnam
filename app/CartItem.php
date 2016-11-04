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

    public function getQuantityAttribute()
    {
        if (!empty($this->attributes['quantity'])) {
            $quantity = (float) $this->attributes['quantity'];
        } else {
            $quantity = 0;
        }

        return $quantity;
    }

    public function getFormatedQuantityAttribute()
    {
        return number_format($this->getQuantityAttribute(), 3, ',', '.');
    }

    public function getSuffixedQuantityAttribute()
    {
        $quantityAttribute = $this->getQuantityAttribute();
        $quantity = number_format($quantityAttribute, 3, '.', '');

        switch ($quantity) {
            case $quantityAttribute == 0:
                return "0 Kgs.";

            case ($quantity > 0 && $quantity < 1):
                return $quantity . " gramas";

            case ($quantity == 1):
                return $quantity . " Kg.";

            default:
                return $quantity . " Kgs.";
        }
    }

    public function getPrefixedPriceAttribute()
    {
        return "R$ " . $this->getPriceAttribute();
    }

    public function save(array $options = [])
    {
        $this->attributes['quantity'] = (float) str_replace(',', '.', $this->attributes['quantity']);
        return parent::save($options);
    }
}
