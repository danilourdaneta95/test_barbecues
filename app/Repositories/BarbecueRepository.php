<?php 

namespace App\Repositories;

use Auth;
use App\Barbecue;
use App\Lease;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class BarbecueRepository
{
	public function getAll(){
        $list = Barbecue::where('id_user', '!=', Auth::user()->id)
            ->whereHas('userCreated', function($query) {
                $query->where('users.zipcode', '=', Auth::user()->zipcode);
            })->get();
    	return $list;
    }

    public function store(Request $request){
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = Carbon::now()->format('Ymddhi').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('../public/images/pictures');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            
            $barbecue = Barbecue::create([
                'description' => $request->input('description'), 
                'model' => $request->input('model'),
                'picture' => $name,
                'id_user' => Auth::user()->id
            ]);
            return $barbecue;
        }
    }
    
    public function ceded($id){
    	$barbecue = Barbecue::find($id);
        $barbecue->users()->attach(Auth::user()->id, [
            'ceded' => true,
            'taken' => false
        ]);
		return $barbecue;
    }

    public function taken(Request $request){
    	$barbecue = Barbecue::find($request->input('id_barbecue'));
        $barbecue->users()->attach(Auth::user()->id, [
            'from' => DateTime::createFromFormat('d/m/Y H:i', $request->input('from'))->format('Y-m-d H:i'),
            'to' => DateTime::createFromFormat('d/m/Y H:i', $request->input('to'))->format('Y-m-d H:i'),
            'ceded' => false,
            'taken' => true
        ]);
		return $barbecue;
    }

    public function get($id){
        $barbecue = Barbecue::find($id);
    	return $barbecue;
    }

    public function validateRent(Request $request){
        $from = DateTime::createFromFormat('d/m/Y H:i', $request->input('from'))->format('Y-m-d H:i');
        $to = DateTime::createFromFormat('d/m/Y H:i', $request->input('to'))->format('Y-m-d H:i');
        $id = $request->input('id_barbecue');
        /* $list = Barbecue::where(function($query) use($from, $to) {
            $query->wherePivot('from', '<', $from)
                ->wherePivot('from', '<', $to);
        })->orWhere(function($query) use($from, $to) {
            $query->wherePivot('to', '>', $from)
                ->wherePivot('to', '>', $to);
        })->get();
        */

        $list = Lease::where(function($query) use($from, $to, $id) {
            $query->where('from', '>=', $from)
                ->where('from', '<=', $to)
                ->where('id_barbecue', '=', $id);
        })->orWhere(function($query) use($from, $to, $id) {
            $query->where('to', '>=', $from)
                ->where('to', '<=', $to)
                ->where('id_barbecue', '=', $id);
        })->orWhere(function($query) use($from, $to, $id) {
            $query->where('from', '>=', $from)
                ->where('to', '<=', $to)
                ->where('id_barbecue', '=', $id);
        })->orWhere(function($query) use($from, $to, $id) {
            $query->where('from', '<=', $from)
                ->where('to', '>=', $to)
                ->where('id_barbecue', '=', $id);
        })->get();
        if ($list->count() > 0) {
            return false;
        }
        else {
            return true;
        }

    }

    public function alreadyRentToday(){
        $list = Lease::where('id_user', '=', Auth::user()->id)
            ->where('created_at', '>=', Carbon::today()->toDateString())
            ->where('taken', '=', 1)->get();

        if ($list->count() > 0) {
            return false;
        }
        else {
            return true;
        }
    }
}