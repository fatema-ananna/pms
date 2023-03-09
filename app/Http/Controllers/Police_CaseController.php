<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Crime;
use App\Models\Inmate;
use App\Models\PoliceCase;
use App\Models\Station;
use Illuminate\Http\Request;


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

      return view('backend.partial.case.case_add',compact('inmate','police_stations','crimes'));}


      
  
public function store(Request $req)
     {
    //   $fileName = null;
    //   if ($req->hasFile('image')) {
    //       // generate name
    //       $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
    //       $req->file('image')->storeAs('/backend/uploads/', $fileName);
      
        PoliceCase ::create([
          "inmate_id"=>$req->inmate_id,
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            // "image"=>$req->filename,
            "court" => $req->court,
            "crime_id"=>$req->crime_id,
            "description" => $req->description,
            "case_start" =>$req->case_start,
            "date" => $req->date,
            "station_id" => $req->police_station_id,
         
         
           
        ]);

        return redirect()->route('inmate')->with('message', 'Created successfully');
    }

  public function view($id)
    {
      // $cases=PoliceCase::where('inmate_id',$id)->get();
  $cases=PoliceCase::find($id);
        return view('backend.partial.case.case_view', compact('cases'));
    }
}
