<?php

namespace App;

class Product
{
    protected $fillable = ["name", "price", "category"];

    public function category()
    {
        return $this->belongsTo(App\Category::class);
    }
}
