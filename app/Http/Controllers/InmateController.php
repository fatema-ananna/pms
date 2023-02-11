<?php

namespace App\Http\Controllers;


use App\Models\Inmate;
use Illuminate\Http\Request;

class InmateController extends Controller
{
    public function inmate(){
        

        $inma=Inmate::paginate(5);


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


    public function edit_inmate($id)
    {
        $inma = inmate::find($id);

        return view('backend.partial.inmate.inmate_edit', compact('inma'));
    }
    public function update_inmate(Request $req, $id)
    {

        $inma = Inmate::find($id);
        $fileName = $inma->image;

        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads', $fileName);
        }


        $inma->name = $req->name;
        $inma->image = $fileName;
        $inma->dob = $req->dob;
        $inma->address = $req->address;
        $inma->phone = $req->phone;
        $inma->gender = $req->gender;
        $inma->case = $req->case;
        $inma->ecd = $req->ecd;
        $inma->punishment = $req->punishment;
        $inma->update();
        return redirect()->route('inmate')->with('message', 'Update success');
    }

}
