<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
      'token',
      'dish_id',
    ];

    public function dishes()
{
    return $this->belongsTo('App\Dish', 'dish_id');
}

    public function orders()
{
    return $this->belongsTo('App\Order', 'order_id');
}


}
