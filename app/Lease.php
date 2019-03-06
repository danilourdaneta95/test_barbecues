<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $table = "leases";
    protected $fillable = [
        'id', 
        'id_user', 
        'id_barbecue', 
        'from', 
        'to',
        'ceded', 
        'taken'
    ];
	public $timestamps = true;
    
	public function barbecue(){
        return $this->belongsTo(Barbecue::class, 'id_barbecue'); 
	}
	public function user(){
        return $this->belongsTo(User::class, 'id_user'); 
	}
}
