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
        if (!empty($this->attributes['image'])) {
            return url('/uploads/img/categories/' . $this->attributes['image']);
        } else {
            return '';
        }
    }
}
