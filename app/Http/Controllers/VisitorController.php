<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function visitor()
    {
        $vis = Visitor::paginate(5);
        return view("backend.partial.visitor.visitor", compact('vis'));
    }

   
}
