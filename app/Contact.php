<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $fillable = ["id", "telephone", "email", "postal_code", "address", "city", "state"];
}
