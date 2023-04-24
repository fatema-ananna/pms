<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
      
    public function crime(){
      
        $crim=Crime::paginate(5);

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
    public function edit($id){
      $cri=crime::find($id);
      return view('backend.partial.crime.edit',compact('cri'));
    }
    public function update(Request $req, $id){
      $cri=crime::find($id);

      $cri->name = $req->name;
      $cri->update();
      return redirect()->route('crime')->with('message', 'successfully updated');

    }
}
