<?php 

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
	public function getAll(){
    	$list = User::where('activo', 1)->get();
    	return $list;
    }

    public function create(Request $request){
    	$user = User::create([
    		'name' => $request->input('name'),
    		'email' => $request->input('email'),
    		'zipcode' => $request->input('zipcode'),
				'password' => Hash::make($request->input('password'))
    	]);
			return $user;
    }

    public function get($id){
    	$user = User::find($id);
    	return $user;
	}
	
	public function edit(Request $request){
		$user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->zipcode = $request->input('zipcode');
        $user->save();
	}
}