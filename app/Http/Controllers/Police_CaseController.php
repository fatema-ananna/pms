<?php

namespace App\Http\Controllers;

use App\Models\Inmate;
use App\Models\Police_Case;
use Illuminate\Http\Request;

class Police_CaseController extends Controller
{
    public function case(){
      
        $pcase=Police_Case::paginate(5);

      return view("backend.partial.case.case",compact('pcase'));
    }
    public function list(){

      $inmates=Inmate::all();
      $police_stations=Police_Case::all();

      return view('backend.partial.case.case_add',compact('inmates','police_stations'));



      
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
            "police_station" => $req->police_station,
         
         
           
        ]);

        return redirect()->route('case')->with('message', 'Created successfully');
    }
}
