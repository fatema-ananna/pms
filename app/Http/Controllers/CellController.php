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
}
