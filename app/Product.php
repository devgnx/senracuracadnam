<?php

namespace App;

use Eloquent;

class Product extends Eloquent
{
    use Slugglable;

    protected $slugfield = "name";
    protected $fillable = ["name", "price", "description", "category"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
        return url('/uploads/img/products/' . $this->attributes['id'] . '.jpeg');
    }

    public function getPriceAttribute()
    {
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    public function getPrefixedPriceAttribute() {
        return "R$ " . $this->getPriceAttribute();
    }
}
