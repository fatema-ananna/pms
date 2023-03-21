<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend;
use App\Models\FrontendAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.master');
    }

    public function list()
    {
        return view('frontend.pages.registration.registration');
    }

    public function store(Request $req)
    {

        FrontendAuth::create([
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "address" => $req->address,
            "number" => $req->number,
            "inmate_id" => $req->inmate_id,
            "relation" => $req->relation,
            "email" => $req->email,
            "password" => bcrypt($req->password)
        ]);
        notify()->success('registration successfully done');
        return redirect()->route('home')->with('message', 'Registration successfully done');
    }
    public function login()
    {
        return view('frontend.pages.login.login');
    }
    public function doLogin(Request $request)
    {

        // $credentials=$request->except('_token');
        $credentials = $request->only(['email', 'password']);
        // dd(auth("frontendAuth")->attempt($credentials));
        if (Auth::guard("frontendAuth")->attempt($credentials)) {
            notify()->success("Login Success");
            return redirect()->route('home');
        }
        return redirect()->back()->with('message', 'invalid credentials');
    }
}
