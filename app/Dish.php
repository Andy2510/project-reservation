<?php

namespace App;

use App\Helpers\PhotoHelper;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
      'title',
      'description',
      'price',
      'imageUrl'
    ];

public function getUrlAttribute()
{
  $photoHelper = app(PhotoHelper::class);
  // siuo atveju dvitaskiai nereiskia statinio metodo, tai reiskia klases nurodyma (kuri siuo atveju yra aprasyta PhotoHelper faile)
  return $photoHelper->generateUrl($this);
}

}
