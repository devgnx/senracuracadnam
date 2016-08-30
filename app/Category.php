<?php

namespace App;

class Category
{
    protected $fillable = ["name"];

    public function products()
    {
        return $this->hasMany(App\Product::class);
    }
}
