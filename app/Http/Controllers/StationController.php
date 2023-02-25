<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    
    public function station(){
      
        $pols=Station::paginate(5);

      return view("backend.partial.station.station",compact('pols'));
    }
    public function list(){
        return view('backend.partial.station.station_add');
    }
    public function station_store(Request $req)
    {
        $req->validate(
            [
                "image" => "required|unique:stations,image",
                'phone' => 'digits:11|required|numeric|unique:stations,phone',]
        );
   
        //dd($req->all());
        
        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/', $fileName);
        }
      
        Station ::create([
            "name" => $req->name,
          
            "image" => $fileName,
            "zilla"=>$req->zilla,
            "thana" =>$req->thana,
            "phone" => $req->phone,
           
        ]);

        return redirect()->route('station')->with('message', 'Created successfully');
    }
    public function edit_station($id)
    {
        $pols = Station::find($id);
        return view('backend.partial.station.station_edit', compact('pols'));
    }
    public function update_station(Request $req, $id)
    {

        $req->validate(
            [
                "image" => "required|unique:stations,image",
                'phone' => 'digits:11|required|numeric|unique:stations,phone',]
        );
        $pols = station::find($id);
        $fileName = $pols->image;

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/backend/uploads/staff/', $fileName);
        }

        $pols->name = $req->name;
        $pols->phone = $req->phone;
        $pols->image = $fileName;
        $pols->zilla = $req->zilla;
        $pols->thana = $req->thana;
     

        $pols->update();

      return redirect()->route('station')->with('message', 'Update success');
    }

    


}
