<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user){
        $this->user = $user;
    }

    public function store(Request $request){
        try{
            if ($request->input('password') == $request->input('password2')) {
                $user = $this->user->create($request);
                return redirect()->route('Home');
            } 
            else {
                return redirect()->back()->withErrors('Las contraseñas no coinciden');
            }
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }

    public function edit(Request $request){
        try{
            $user = $this->user->edit($request);
            return redirect()->route('Profile')->with('msj', 'Cambios Guardados satisfactoriamente');
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }

    public function show($id){
        try{
            $user = $this->user->get($id);
            return view('user.show')->with('user', $user);
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }
}
