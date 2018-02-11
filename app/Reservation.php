<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
      'name',
      'phone'
      'no_persons',
      'date',
      'time'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
