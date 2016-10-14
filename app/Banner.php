<?php
namespace App;

use Eloquent;

class Banner extends Eloquent
{
    public function getImageAttribute()
    {
        if (!empty($this->attributes['image'])) {
            return url('/uploads/img/banners/' . $this->attributes['image']);
        } else {
            return '';
        }
    }
}
