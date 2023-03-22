<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function visitor(){
        return view('frontend.pages.visitor.visitor');
    }
}
