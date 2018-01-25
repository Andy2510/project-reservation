<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'phone',
        'email',
        'password',
        'address',
        'city',
        'zip',
        'country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country(){
      return $this->hasOne('App\Country');
    }

    public function isAdmin()
    {

    return $this->is_admin; // this looks for an admin column in your users table
    }
}
