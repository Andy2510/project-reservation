<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'user_id',
    'total_amount',
    'tax_amount',
    'payment_status'
  ];

  public function carts()
  {
    return $this->hasMany('App\Cart');
  }

  public function users()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
}
