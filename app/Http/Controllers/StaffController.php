<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
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
        $roles=Role::all();

        return view("backend.partial.staff.staff_create",compact('roles'));
    }
    public function store(Request $req)
    {
        // dd($req->all());
        $req->validate(
            [
                "image" => "required|unique:staff,image",
                'dob'   => 'required|date|before:2005-04-15',
                // 'phone' => 'digits:11|required|numeric|unique:staff,phone',
                'nic' => 'digits:17|required|numeric|unique:staff,nic'
            ]
        );

        //dd($req->all());

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/staff/', $fileName);
        }

        // $user = User::created([
        //     "name" => "some_thing",
        //     "email" => "some@gmail.com"
        // ]);
        $user=User::create([
            'first_name'=>$req->first_name,
            'last_name'=>$req->last_name,
            'password'=>bcrypt($req->password) ,
            'role_id'=>$req->role_id ,
            'email'=>$req->email ,
            'mobile'=>$req->phone
        ]);
        Staff::create([
            "user_id" => $user->id,
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "email"=>$req->email,
            'password'=>bcrypt($req->password) ,
            "image" => $fileName,
            "dob" => $req->dob,
            "address" => $req->address,
            "nic" => $req->nic,
            "phone" => $req->phone,
            "religon" => $req->religon,
            "gender" => $req->gender,
            "designation" => $req->designation,
            "assign_in" => $req->assign_in,

        ]);

        return redirect()->route('staff')->with('message', 'Created successfully');
    }
    public function delete_staff($id)
    {

        $sta = Staff::find($id);
        $sta->delete();
        return redirect()->back();
    }
    public function view_staff($id)
    {
        $sta = Staff::find($id);

        return view('backend.partial.staff.staff_view', compact('sta'));
    }

    public function edit_staff($id)
    {
        $sta = Staff::find($id);
        return view('backend.partial.staff.staff_edit', compact('sta'));
    }

       public function update_staff(Request $req, $id)
    {

        $req->validate(
            [
                "image" => "required|unique:staff,image",
                'dob'   => 'required|date|before:2005-04-15',
                'phone' => 'digits:11|required|numeric|unique:staff,phone',
                'nic' => 'digits:17|required|numeric|unique:staff,nic'
            ]
        );
        $sta = Staff::find($id);
        $fileName = $sta->image;

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/staff/', $fileName);
        }

        $sta->first_name = $req->first_name;
        $sta->last_name = $req->last_name;
        $sta->image = $fileName;
        $sta->dob = $req->dob;
        $sta->address = $req->address;
        $sta->nic = $req->nic;
        $sta->phone = $req->phone;
        $sta->religon = $req->religon;
        $sta->gender = $req->gender;
        $sta->designation = $req->designation;
        $sta->assign_in = $req->assign_in;

        $sta->update();

      return redirect()->route('staff')->with('message', 'Update success');
    }
}
