<?php

namespace App\Http\Controllers;


use App\Models\Inmate;
use Illuminate\Http\Request;

class InmateController extends Controller
{
    public function inmate(){
        

        $inma=Inmate::all();


        return view("backend.partial.inmate.inmate",compact('inma'));
    }
    public function list(){
        return view('backend.partial.inmate.inmate_add');
    }

    public function store(Request $req)
    {

   
        //dd($req->all());
        
        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads', $fileName);
        }
      
        Inmate ::create([
            "name" => $req->name,
            "image" => $fileName,
            "dob"=>$req->dob,
            "address" =>$req->address,
            "phone" => $req->phone,
            "gender" => $req->gender,
            "case" => $req->case,
            "ecd" => $req->ecd,
            "punishment" => $req->punishment,
           
        ]);

        return redirect()->route('inmate')->with('message', 'Created successfully');
    }
    
    public function deleteinmate($id)
    {

        $inma = Inmate::find($id);
        $inma->delete();
        return redirect()->back();
    }
    public function viewinmate($id)
    {
        $inma = Inmate::find($id);

        return view('backend.partial.inmate.inmate_view', compact('inma'));
    }

}
