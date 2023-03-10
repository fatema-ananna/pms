<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Inmate;
use App\Models\PoliceCase;
use App\Models\Punishment;
use App\Models\Ward;
use Illuminate\Http\Request;

class InmateController extends Controller
{
    public function inmate(){
        

        $inma=Inmate::paginate(5);


        return view("backend.partial.inmate.inmate",compact('inma'));
    }
    public function list(){
        $wards = Ward::all();
       $activities= Activity::all();
        // dd( $activities);
        $punishments= Punishment::all();
        return view('backend.partial.inmate.inmate_add',compact('wards','punishments','activities'));
    }

    public function store(Request $req)
    {
        $req->validate(
            [
                "image" => "required|unique:inmates,image",
                "phone"=> "required|unique:inmates,phone",
                "relatives_number"=> "required|unique:inmates,relatives_number"
            ]
        );
   
        //dd($req->all());
        
        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/', $fileName);
        }
      
        Inmate ::create([
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "image" => $fileName,
            "dob"=>$req->dob,
            "address" =>$req->address,
            "country" => $req->country,
            "religon" => $req->religon,
            "phone" => $req->phone,
            "gender" => $req->gender,
            "ward_id" => $req->ward_id,
            "relatives_name" => $req->relatives_name,
            "relatives_number" => $req->relatives_number,
            "relation" => $req->relation,
            "activity_id" => $req->activity_id,
            "punishment_id" => $req->punishment_id,
           
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
        $activities= Activity::find($id);
        $cases=PoliceCase::where('inmate_id',$id)->get();
        $punishments=Punishment::find($id);
        return view('backend.partial.inmate.inmate_view', compact('inma','activities','cases','punishments'));
    }


    public function edit_inmate($id)
    {
        $inma = inmate::find($id);

        return view('backend.partial.inmate.inmate_edit', compact('inma'));
    }
    public function update_inmate(Request $req, $id)
    {


        $req->validate(
            [
                "image" => "required|unique:inmates,image",
                "case" => "required"
            ]
        );

        $inma = Inmate::find($id);
        $fileName = $inma->image;

        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads', $fileName);
        }


        $inma->first_name = $req->first_name;
        $inma->last_name = $req->last_name;
        $inma->image = $fileName;
        $inma->dob = $req->dob;
        $inma->address = $req->address;
        $inma->phone = $req->phone;
        $inma->country = $req->country;
        $inma->gender = $req->gender;
        $inma->religon = $req->religon;
      
        $inma->ward_id = $req->ward_id;
        $inma->relatives_name = $req->relatives_name;
        $inma->relatives_number = $req->relatives_number;
        $inma->relation = $req->relation;
        $inma->punishment_id = $req->punishment_id;
        $inma->activity_id = $req->activity_id;
        
        $inma->update();
        return redirect()->route('inmate')->with('message', 'Update success');
    }

}
