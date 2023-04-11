<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Ward;
use App\Models\Inmate;
use App\Models\Activity;
use App\Models\Cell;
use App\Models\PoliceCase;
use App\Models\Punishment;
use Illuminate\Http\Request;

class InmateController extends Controller
{
    public function inmate()
    {
        $cells = Cell::all();

        $inma = Inmate::paginate(5);


        return view("backend.partial.inmate.inmate", compact('inma', 'cells'));
    }
    public function list()
    {
        $cells = Cell::all();
        $wards = Ward::all();
        //    $activities= Activity::all();
        // dd( $activities);
        // $punishments= Punishment::all();
        return view('backend.partial.inmate.inmate_add', compact('wards', 'cells'));
    }

    public function store(Request $req)
    {
        $req->validate(
            [
                "dob" => 'required|date|before:2002-04-15',
                "image" => "required|unique:inmates,image",
                "nid" => 'digits:17|required|numeric|unique:inmates,nid',
                "relatives_number" => "digits:11|required|unique:inmates,relatives_number"
            ]
        );

        //dd($req->all());

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/', $fileName);
        }

        $inamte =  Inmate::create([
            "inmate_id" => date('Ymdhmi'),
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "image" => $fileName,
            "dob" => $req->dob,
            "address" => $req->address,
            "country" => $req->country,
            "religon" => $req->religon,
            "nid" => $req->nid,
            "gender" => $req->gender,
           
            "ward_id" => $req->ward_id,
            "cell_id" => $req->cell_id,
            "relatives_name" => $req->relatives_name,
            "relatives_number" => $req->relatives_number,
            "relation" => $req->relation,
        ]);
        if ($inamte) {
            $cell =  Cell::find($req->cell_id);
            $cell->update([
                "isBooked" => 1
            ]);
        }

        toastr()->success('successfully done');
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
        // $activities= Activity::find($id);
        $cases = PoliceCase::where('inmate_id', $id)->get();
        // $punishments=Punishment::find($id);
        return view('backend.partial.inmate.inmate_view', compact('inma', 'cases'));
    }


    public function edit_inmate($id)
    {
        $inma = inmate::find($id);
        $wards = Ward::all();
        return view('backend.partial.inmate.inmate_edit', compact('inma', 'wards'));
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


        $inma->first_name = $req->first_name;
        $inma->last_name = $req->last_name;
        $inma->image = $fileName;
        $inma->dob = $req->dob;
        $inma->address = $req->address;
        $inma->nid = $req->nid;
        $inma->country = $req->country;
        $inma->gender = $req->gender;
        $inma->religon = $req->religon;

       
        $inma->ward_id = $req->ward_id;
        $inma->relatives_name = $req->relatives_name;
        $inma->relatives_number = $req->relatives_number;
        $inma->relation = $req->relation;


        $inma->update();
        return redirect()->route('inmate')->with('message', 'Updated successfully');
    }
}
