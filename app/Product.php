<?php

namespace App;

class Product extends \Eloquent
{
    protected $fillable = ["name", "price", "category"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
        return url('/uploads/img/' . $this->attributes['id'] . '.jpeg');
    }

    public function getPriceAttribute()
    {
        return "R$" . number_format($this->attributes['price'], 2, ',', '.');
    }
}
