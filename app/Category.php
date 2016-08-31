<?php

namespace App;

class Category extends \Eloquent
{
    protected $fillable = ["name"];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
