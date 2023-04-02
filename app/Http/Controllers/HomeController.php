<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {


        return view("backend.partial.dashboard");
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
