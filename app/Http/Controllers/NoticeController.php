<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use PHPUnit\Framework\Error\Notice as ErrorNotice;

class NoticeController extends Controller
{
    public function notice(){
        $not=Notice::paginate(5);
        return view ('backend.partial.notice.notice',compact('not'));
    }
    public function form(){
        return view('backend.partial.notice.form');
    }
    public function store(Request $req){



        
        $fileName = null;
        if ($req->hasFile('pdf')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('pdf')->getClientOriginalExtension();
            $req->file('pdf')->storeAs('/backend/pdf/', $fileName);
        }
        Notice::create([
            "name" => $req->name,
            "pdf"=>$fileName,
        ]);
        toastr()->success('successfully done');
        return redirect()->route('notice')->with('message', 'Created successfully');
    }
    }

