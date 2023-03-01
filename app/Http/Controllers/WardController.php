<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
       
    public function ward(){
      
        $ward=Ward::paginate(2);

      return view("backend.partial.ward.ward",compact('ward'));
    }
    public function list(){
        return view('backend.partial.ward.ward_add');
    }
    public function store(Request $req)
    {
       
        Ward ::create([
            "name" => $req->name,
            "cell_no"=>$req->cell_no,
          "status"=>$req->status
           
        ]);

        return redirect()->route('ward')->with('message', 'Created successfully');
   
}
}
