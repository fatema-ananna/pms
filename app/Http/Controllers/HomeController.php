<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

       
        return view("backend.partial.dashboard");
   
    }

    public function changeLanguage($lang)
    {
        session()->put('loc',$lang);
        return redirect()->back();

    }
}
