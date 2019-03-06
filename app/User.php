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
        'name', 'email', 'password', 'zipcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function barbecues(){
        return $this->belongsToMany(Barbecue::class, 'leases', 'id_user', 'id_barbecue')->withPivot('from', 'to', 'ceded', 'taken');
    }

    public function myBarbecues(){
    	return $this->hasMany(Barbecue::class, 'id_user');
    }
}
