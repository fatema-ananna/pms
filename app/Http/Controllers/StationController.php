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
                
                'phone' => 'digits:11|required|numeric|unique:stations,phone',]
        );
   
        // $fileName = null;
        // if ($req->hasFile('image')) {
        //     // generate name
        //     $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
        //     $req->file('image')->storeAs    }
      
        Station ::create([
            "name" => $req->name,
          
            "zilla"=>$req->zilla,
            "thana" =>$req->thana,
            "phone" => $req->phone,
            "postal_code"=>$req->postal_code,
           
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

     
        $pols = station::find($id);

        $pols->name = $req->name;
        $pols->phone = $req->phone;
        $pols->postal_code = $req->postal_code;
        $pols->zilla = $req->zilla;
        $pols->thana = $req->thana;
     

        $pols->update();

      return redirect()->route('station')->with('message', 'Update success');
    }
    public function view_station($id)
    {
        $pols = Station::find($id);

        return view('backend.partial.station.station_view', compact('pols'));
    }
    


}
