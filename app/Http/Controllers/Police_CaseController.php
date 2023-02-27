<?php

namespace App\Http\Controllers;

use App\Models\Police_Case;
use Illuminate\Http\Request;

class Police_CaseController extends Controller
{
    public function case(){
      
        $pcase=Police_Case::paginate(5);

      return view("backend.partial.case.case",compact('pcase'));
    }
    public function list(){
      return view('backend.partial.case.case_add');
  }
  public function store(Request $req)
    {
      
   
      
        Police_Case ::create([
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "court" => $req->court,
            "crime_type"=>$req->crime_type,
            "case_start" =>$req->case_start,
            "date" => $req->date,
         
         
           
        ]);

        return redirect()->route('case')->with('message', 'Created successfully');
    }
}
