<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function list(){
        return view('backend.partial.permission.index');
    }
}
