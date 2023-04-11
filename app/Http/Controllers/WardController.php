<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
       
    public function ward(){
      
        $ward=Ward::paginate(5);

      return view("backend.partial.ward.ward",compact('ward'));
    }
    public function list(){
        return view('backend.partial.ward.ward_add');
    }
    public function store(Request $req)
    {
       
        Ward ::create([
            "name" => $req->name,
            "ward_type"=>$req->ward_type,
           
          "status"=>$req->status
           
        ]);

        return redirect()->route('ward')->with('message', 'Created successfully');
   
}
public function edit($id)
{
    $ward = Ward::find($id);

    return view('backend.partial.ward.ward_edit', compact('ward'));
}
public function update(Request $req,$id)
{
  $ward = Ward::find($id);
  
      $ward->name = $req->name;
      $ward->ward_type=$req->ward_type;
  
      $ward->status=$req->status;
      $ward->update();
       
   
    return redirect()->route('ward')->with('message', 'Update success');
}
}
