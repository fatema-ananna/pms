<?php

namespace App\Http\Controllers\frontend;

use App\Models\Visitor;
use App\Models\FrontendAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    public function visitor(){
        $visitors=Visitor::where('frontend_auth_id',auth('frontendAuth')->user()->id)->paginate(2);
        return view('frontend.pages.visitor.visitor',compact('visitors'));
    }
    public function edit(){
        return view('frontend.pages.visitor.edit');
    }
    public function store(Request $req ){
        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/frontend/slider/', $fileName);
        }
        
        FrontendAuth::create([
            
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "image" => $fileName,
            "address" => $req->address,
            "number" => $req->number,
            "inmate_id" => $req->inmate_id,
            "relation" => $req->relation,
            "email" => $req->email,
            "password" => bcrypt($req->password)
        ]);
        notify()->success('updated successfully done');
        return redirect()->route('frontend.visitor');

    }
    public function form(){
        return view('frontend.pages.visitor.form');
    }
      public function visitor_store(Request $req )
    {
        $req->validate(
            [ 
        "dob" => 'required|date|before:2002-04-15',
        "number" => "digits:11|required|unique:visitors,number"
            ]);
        //dd($req->all());

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/frontend/slider/', $fileName);
        }

        Visitor::create([
            "frontend_auth_id"=>auth('frontendAuth')->user()->id,
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "inmate_id"=>$req->inmate_id,
            "image" => $fileName,
            "dob" => $req->dob,
            "address" => $req->address,
            "number" => $req->number,
            "country" => $req->country,
            "religon" => $req->religon,
            "nid" => $req->nid,
            "gender" => $req->gender,
            "relation" => $req->relation
          


        ]);
    toastr()->success('fatema');
        return redirect()->route('frontend.visitor')->with('message', 'Appointment successfully created');
    }

}
