<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function list(){
        $permission=Permission::paginate(12);
        return view('backend.partial.permission.index',compact('permission'));
    }
}
