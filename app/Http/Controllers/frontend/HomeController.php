<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FrontendAuth;
use App\Models\gallery;
use App\Models\Inmate;
use App\Models\Notice;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $gallery = gallery::all();
        $not = Notice::all();
        //   dd();
        return view('frontend.master', compact('gallery', 'not'));
    }

    function list() {
        return view('frontend.pages.registration.registration');
    }

    public function store(Request $req)
    {
        $validation = Validator::make($req->all(), [
            "first_name" => "required",
            "last_name" => "required",
            "address" => "required",
            "number" => "required",
            "inmate_id" => "required",
            "relation" => "required",
            "email" => "required|email|unique:frontend_auths,email",
            "password" => "required",
        ]);

        if ($validation->fails()) {
            notify()->error('please fill up all the field');
            return back();
        }

        $inmate = Inmate::where('inmate_id', $req->inmate_id)->first();
        if (!$inmate) {

            notify()->error('inmate id not match');
            return redirect()->back();
        }
        $user = FrontendAuth::where('inmate_id', $req->inmate_id)->first();
        if ($user) {
            notify()->error('inmate id already exist');
            return redirect()->back();
        }
        FrontendAuth::create([
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "address" => $req->address,
            "number" => $req->number,
            "inmate_id" => $req->inmate_id,
            "relation" => $req->relation,
            "email" => $req->email,
            "password" => bcrypt($req->password),
        ]);
        notify()->success('registration successfully done');
        return redirect()->route('home')->with('message', 'Registration successfully done');
    }
    public function login()
    {
        $roles = Role::all();
        return view('frontend.pages.login.login', compact('roles'));
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

    public function logout()
    {
        Auth::guard("frontendAuth")->logout();
        auth("frontendAuth")->logout();

        notify()->success("logout successfully done");
        return redirect()->route('home');
    }
}
