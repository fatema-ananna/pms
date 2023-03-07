<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Inmate;
use App\Models\PoliceCase;
use App\Models\Staff;
use App\Models\Station;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Case_;

class Police_CaseController extends Controller
{
    public function case(){
    
      
        $pcase=PoliceCase::with("station")->paginate(5);

      return view("backend.partial.case.case",compact('pcase'));
    }
    public function list($id){

      $inmate=Inmate::find($id);
      $police_stations=Station::all();
      $crimes=Crime::all();

      return view('backend.partial.case.case_add',compact('inmate','police_stations','crimes'));



      
  }
  public function store(Request $req)
    {
        PoliceCase ::create([
          "inmate_id"=>$req->inmate_id,
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "court" => $req->court,
            "crime_id"=>$req->crime_id,
            "case_start" =>$req->case_start,
            "date" => $req->date,
            "station_id" => $req->police_station_id,
         
         
           
        ]);

        return redirect()->route('inmate')->with('message', 'Created successfully');
    }
}
