<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barbecue extends Model
{
    protected $table = "barbecues";
    protected $fillable = [
    	'id', 
		'description', 
		'model',
        'picture', 
        'id_user'
    ];
	public $timestamps = true;
    
    public function users(){
        return $this->belongsToMany(User::class, 'leases', 'id_barbecue', 'id_user')->withPivot('from', 'to', 'ceded', 'taken');
    }

	public function userCreated(){
        return $this->belongsTo(User::class, 'id_user'); 
	}
}
