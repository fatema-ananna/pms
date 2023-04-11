<?php

namespace App\Http\Controllers;

use App\Models\Punishment;
use Illuminate\Http\Request;

class PunishmentController extends Controller
{
    public function punishment(){
      
        $punish=Punishment::paginate(2);

      return view("backend.partial.punishment.punishment",compact('punish'));
    }
    public function list(){
        return view('backend.partial.punishment.punishment_add');
    }
    public function store(Request $req)
    {
       
        Punishment ::create([
            "name" => $req->name,
            "type" => $req->type,
           
          
           
        ]);

        return redirect()->route('punishment')->with('message', 'Created successfully');
    }
    public function edit($id){
        $punish=Punishment::find($id);
        return view('backend.partial.punishment.edit',compact('punish'));
    }
    public function update(Request $req, $id){
        $punish=Punishment::find($id);

        

        $punish->name = $req->name;
        $punish->type = $req->type;

        $punish->update();


        return redirect()->route('punishment')->with('message', 'successfully updated');

    }
}
