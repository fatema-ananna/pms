<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Crime;
use App\Models\Inmate;
use App\Models\PoliceCase;
use App\Models\Punishment;
use App\Models\Station;
use Illuminate\Http\Request;


class Police_CaseController extends Controller
{
  public function case()
  {


    $pcase = PoliceCase::with("station")->paginate(5);

    return view("backend.partial.case.case", compact('pcase'));
  }
  public function list($id)
  {

    $inmate = Inmate::find($id);
    $police_stations = Station::all();
    $crimes = Crime::all();
    $punishments = Punishment::all();
    $activities = Activity::all();
    return view('backend.partial.case.case_add', compact(
      'inmate',
      'police_stations',
      'crimes',
      'punishments',
      'activities'
    ));
  }




  public function store(Request $req)
  {
    $req->validate(
      [
        "description" => "required|:police_cases,description",
        // "punishment" => "required|:police_cases,punishment",
        "case_start"=>" required|date|after:date",
            "punishment_start"=>'after:tomorrow'

  ]
    );


    PoliceCase::create([
      "inmate_id" => $req->inmate_id,
      "first_name" => $req->first_name,
      "last_name" => $req->last_name,
  
      "court" => $req->court,
      "crime_id" => $req->crime_id,
      "description" => $req->description,
      "case_start" => $req->case_start,
      "date" => $req->date,
      "station_id" => $req->police_station_id,
      "punishment_id" => $req->punishment_id,
      "type" => $req->type,
      "duration" => $req->duration,
      "punishment_start" => $req->punishment_start,
      "activity_id" => $req->activity_id,



    ]);

    return redirect()->route('inmate')->with('message', 'Created successfully');
  }

  public function view($id)
  {
    // $cases=PoliceCase::where('inmate_id',$id)->get();
    $cases = PoliceCase::find($id);
    $inma= Inmate::all();
    return view('backend.partial.case.case_new', compact('cases','inma'));
  }
  public function edit($id){
    $cases = PoliceCase::find($id);
    return view('backend.partial.case.edit',compact('cases'));
  }
 public function update(Request $req, $id){

  $cases = PoliceCase::find($id);

  $cases->inmate_id = $req->inmate_id;
  $cases->first_name = $req->first_name;
  $cases->last_name = $req->last_name;
  $cases->court = $req->court;
  $cases->crime_id = $req->crime_id;
  $cases->description = $req->description;
  $cases->case_start = $req->case_start;
  $cases->station_id = $req->police_station_id;
  $cases->punishment_id = $req->punishment_id;
  $cases->type = $req->type;
  $cases->duration = $req->duration;
  $cases->punishment_start = $req->punishment_start;
  $cases->activity_id = $req->activity_id;

  $cases->update();
  return redirect()->route('case')->with('message', 'successfully updated');

 }





}
