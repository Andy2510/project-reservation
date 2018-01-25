<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
      'title',
      'description',
      'price',
      'imageUrl'
    ];
}
