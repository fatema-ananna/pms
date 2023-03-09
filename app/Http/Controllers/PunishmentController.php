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
            "month" => $req->month,
          
           
        ]);

        return redirect()->route('punishment')->with('message', 'Created successfully');
    }
}
