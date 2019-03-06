<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BarbecueRepository;

class BarbecueController extends Controller
{
    protected $barbecue;

    public function __construct(BarbecueRepository $barbecue){
        $this->barbecue = $barbecue;
    }

    public function index ()
    {
        try{
            return view('barbecues.index');
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }

    public function create ()
    {
        try{
            return view('barbecues.create');
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }
    
    public function store (Request $request)
    {
        try{
            $barbecue = $this->barbecue->store($request);
            return redirect()->route('Barbecues');
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }

    public function show($id)
    {
        try{
            $barbacoa = $this->barbecue->get($id);
            return view('barbecues.show')->with('barbecue', $barbacoa);
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }

    public function taken(Request $request)
    {
        try{
            if (!$this->barbecue->validateRent($request)) {
                return redirect()->back()->withErrors('La barbacoa ya se encuentra rentada dentro del tiempo indicado');
            } 
            /*else if (!$this->alreadyRentToday()) {
                return redirect()->back()->withErrors('Usted ya ha rentado una barbacoa hoy');
            }*/
            else {
                $barbecue = $this->barbecue->taken($request);
                return redirect()->route('Barbecues');
            }
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }
}
