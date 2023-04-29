<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
  public function activity()
  {

    $act = Activity::paginate(5);

    return view("backend.partial.activity_type.activity", compact('act'));
  }
  public function list()
  {
    return view("backend.partial.activity_type.activity_add");
  }
  public function store(Request $req)
  {

    Activity::create([
      "name" => $req->name,

      "status" => $req->status

    ]);

    return redirect()->route('activity')->with('message', 'Created successfully');
  }

  public function getActivities(Request $request){
    $activities = Activity::all();
    return $activities;
  }
  public function edit($id){
    
    $act = Activity::find($id);
       return view('backend.partial.activity_type.edit',compact('act'));
  }
  public function update(Request $req,$id ){
    $act = Activity::find($id);

    $act->name = $req->name;
    $act->update();
    return redirect()->route('activity')->with('message', 'successfully updated');



  }
}
