<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
      
    public function crime(){
      
        $crim=Crime::paginate(2);

      return view("backend.partial.crime.crime_type",compact('crim'));
    }
    public function list(){
        return view('backend.partial.crime.crime_add');
    }
    public function store(Request $req)
    {
       
        Crime ::create([
            "name" => $req->name,
          "status"=>$req->status
           
        ]);

        return redirect()->route('crime')->with('message', 'Created successfully');
    }
}
