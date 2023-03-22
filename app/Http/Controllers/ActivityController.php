<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activity(){
      
        $act=Activity::paginate(2);

      return view("backend.partial.activity_type.activity",compact('act'));
    }
    public function list(){
        return view("backend.partial.activity_type.activity_add");
    }
    public function store(Request $req)
    {
       
        Activity ::create([
            "name" => $req->name,
   
          "status"=>$req->status
           
        ]);

        return redirect()->route('activity')->with('message', 'Created successfully');
   
} 
}
