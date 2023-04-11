<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Models\Ward;
use Illuminate\Http\Request;

class CellController extends Controller
{

    public function cell()
    {
        $ward = Ward::all();
        $cells = Cell::paginate(5);

        return view("backend.partial.cell.table", compact('cells', 'ward'));
    }
    public function list()
    {
        $ward = Ward::all();

        return view('backend.partial.cell.form', compact('ward'));
    }
    public function store(Request $req)
    {

        Cell::create([
            "cell_no" => $req->cell_no,
            "ward_id" => $req->ward_id,
            "status" => $req->status

        ]);

        return redirect()->route('cell')->with('message', 'Created successfully');
    }
    public function getCells(Request $req){
        $cells = Cell::where("ward_id",$req->wardId)->where("isBooked",0)->get();
        return $cells;
    }
    public function edit($id){
        $ward=Ward::all();
        $cell=cell::find($id);
        return view('backend.partial.cell.edit',compact('cell','ward'));
      }
      public function update(Request $req, $id){
        $cell=cell::find($id);
  
        $cell->cell_no = $req->cell_no ;
        $cell->ward_id = $req->ward_id ;
        $cell->status= $req->status ;
        $cell->update();
        return redirect()->route('cell')->with('message', 'successfully updated');
  
      }








}
