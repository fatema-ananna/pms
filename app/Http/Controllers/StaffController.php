<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function staff()
    {
      $sta = Staff::paginate(5);
      return view("backend.partial.staff.staff", compact('sta'));
    }
    public function list()
    {
   
      return view("backend.partial.staff.staff_create");
    }
    public function store(Request $req)
    {
        // $req->validate(
        //     [
        //         "image" => "required|unique:inmates,image",
        //         "case" => "required"
        //     ]
        // );
   
        //dd($req->all());
        
        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/staff/', $fileName);
        }
      
        Staff ::create([
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "image" => $fileName,
            "age"=>$req->age,
            "address" =>$req->address,
            "nic" => $req->nic,
            "phone" => $req->phone,
            "religon" => $req->religon,
           "gender" => $req->gender,
            "designation" => $req->designation,
            "assign_in" => $req->assign_in,
          
        ]);

        return redirect()->route('staff')->with('message', 'Created successfully');
    }


}
