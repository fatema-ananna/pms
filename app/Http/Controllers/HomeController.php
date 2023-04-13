<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\gallery;
use App\Models\Inmate;
use App\Models\PoliceCase;
use App\Models\Punishment;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $count = [];
        $count["inmate"] = Inmate::all()->count();
        $count['totalCrime'] = Crime::all()->count();
        $count['punishment'] = Punishment::all()->count();
        $count['visitor'] = Visitor::whereDate("created_at", now())->get()->count();
        $count['case'] = PoliceCase::all()->count();



        return view("backend.partial.dashboard",compact("count"));
    }

    public function changeLanguage($lang)
    {
        session()->put('loc', $lang);
        return redirect()->back();
    }
    public function gallery()
    {

        $gallery = gallery::paginate(5);

        return view("backend.partial.gallery.gallery", compact('gallery'));
    }
    public function form()
    {


        return view("backend.partial.gallery.form");
    }
    public function picture_store(Request $req)
    {

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/frontend/gallery.picture/', $fileName);
        }
        Gallery::create([
            "name" => $req->name,
            "image" => $fileName,


        ]);

        return redirect()->route('gallery')->with('message', 'Created successfully');
    }
    public function edit($id)
    {
        $gallery = gallery::find($id);
        return view('backend.partial.gallery.edit',compact('gallery'));
    }
    public function update(Request $req, $id)
    {
        $gallery=gallery::find($id);
        $fileName = $gallery->image;

        if ($req->hasFile('image')) { 
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/frontend/gallery.picture', $fileName);
        }

        $gallery->name = $req->name;
         $gallery->image = $fileName;

        $gallery->update();
        return redirect()->route('gallery')->with('messege','successfully updated');
}
}
