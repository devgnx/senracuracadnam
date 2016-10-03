<?php

namespace App;

class Category extends \Eloquent
{
    protected $fillable = ["name"];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getImageAttribute()
    {
        return url('/uploads/img/categories/' . $this->attributes['id'] . '.jpg');
    }

    // public function scopeSortByName()
    // {
    //     return $this->orderBy
    // }
}
