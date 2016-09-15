<?php

namespace App;

use Eloquent;

class Product extends Eloquent
{
    use Slugglable;

    protected $slugColumn = "url";
    protected $slugBaseColumn = "name";

    protected $fillable = ["name", "price", "description", "category", "url"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getImageAttribute()
    {
        return url('/uploads/img/products/' . $this->attributes['id'] . '.jpeg');
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
