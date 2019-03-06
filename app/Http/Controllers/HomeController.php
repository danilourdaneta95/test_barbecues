<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BarbecueRepository;

class HomeController extends Controller
{
    protected $barbecue;

    public function __construct(BarbecueRepository $barbecue){
        $this->barbecue = $barbecue;
    }

    public function index ()
    {
        try{
            $barbecues = $this->barbecue->getAll();
            return view('index')->with('barbecues', $barbecues);
        }
        catch(Exception $ex){
            return view("Se ha producido un error\n\n
                Detalles:\n".$ex);
        }
    }
}
