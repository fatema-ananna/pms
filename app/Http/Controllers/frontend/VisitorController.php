<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FrontendAuth;
use App\Models\Inmate;
use App\Models\InmateDeposit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function visitor()
    {
        // dd(now()->format("M"));
        $visitors = Visitor::where('frontend_auth_id', auth('frontendAuth')->user()->id)->paginate(2);

        if (!$visitors) {
            $visitors = collect([]);
        }

        $date = $visitors->pluck("created_at");
        $monthsCount = 0;
        foreach ($date as $data) {
            if ($data->format("M") === now()->format("M")) {
                $monthsCount = $monthsCount + 1;
            }
        }

        $date = $visitors->pluck("created_at");
        $months = 0;
        foreach ($date as $data) {
            if ($data->format("m") == now()->format("m")) {
                $months = $monts = 1;
            }
        }
        // dd($monthsCount);
        return view('frontend.pages.visitor.visitor', compact('visitors', "monthsCount"));
    }
    public function edit($id)
    {
        return view('frontend.pages.visitor.edit');
    }
    public function update(Request $req, $id)
    {

        $profile = FrontendAuth::find($id);
        $fileName = $profile->image;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/frontend/slider/', $fileName);
        }

        $profile->first_name = $req->first_name;
        $profile->last_name = $req->last_name;
        $profile->image = $fileName;
        $profile->address = $req->address;
        $profile->number = $req->number;
        $profile->inmate_id = $req->inmate_id;
        $profile->relation = $req->relation;

        $profile->update();

        notify()->success('updated successfully done');
        return redirect()->route('frontend.visitor');
    }
    public function form()
    {
        return view('frontend.pages.visitor.form');
    }
    public function visitor_store(Request $req)
    {
        $validation = Validator::make($req->all(), [
            "dob" => 'required|date|before:2002-04-15',
            "number" => "digits:11|required",
            "appoint_date" => "required|date|after:today",
        ]);
        if ($validation->fails()) {
            foreach ($validation->errors()->messages() as $key => $msg) {
                foreach ($msg as $err) {
                    notify()->error($err);
                }
            }
            return back();
        }
        //dd($req->all());

        $todayAppoint = Visitor::where("appointment_date", now()->format("Y-m-d"))->where("frontend_auth_id", auth("frontend_auth")->user()->id)->count();

        if ($todayAppoint) {
            notify()->error("You have already taken an appointment today");
            return back();
        }

        $fileName = null;
        if ($req->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/frontend/slider/', $fileName);
        }

        Visitor::create([
            "frontend_auth_id" => auth('frontendAuth')->user()->id,
            "first_name" => $req->first_name,
            "last_name" => $req->last_name,
            "inmate_id" => $req->inmate_id,
            "image" => $fileName,
            "dob" => $req->dob,
            "address" => $req->address,
            "number" => $req->number,
            "country" => $req->country,
            "appointment_date" => $req->appoint_date,
            "religon" => $req->religon,
            "nid" => $req->nid,
            "gender" => $req->gender,
            "relation" => $req->relation,
            "status" => "pending",

        ]);
        notify()->success('Appointment successfully created');
        return to_route('frontend.visitor');
    }
    public function visitor_status(Request $req, $id)
    {
        $visitor = Visitor::find($id);

        $validation = Validator::make($req->all(), [
            "appointment_date" => "date|after:today",
        ]);

        if ($validation->fails()) {
            foreach ($validation->errors()->messages() as $msg) {
                foreach ($msg as $err) {
                    notify()->error($err);
                }
            }
            return back();
        }

        $visitor->update(["status" => $req->status, "appointment_date" => $req->appointment_date]);
        notify()->success('Status successfully updated');
        return redirect()->back();
    }
    public function paymentForm()
    {
        // 20230405040402
        $inma = collect([]);
        $depo = collect([]);
        if (auth("frontendAuth")?->user()?->id) {
            $inma = Inmate::where("inmate_id", auth('frontendAuth')->user()->inmate_id)->first();
            $depo = InmateDeposit::where('inmate_id', auth('frontendAuth')->user()->inmate_id)->first();
        } else {
            return to_route("frontend.login");
        }
        // dd($depo);
        // where("inmate_id",auth()->user()->inmate_id);
        // dd($inma);
        return view('frontend.pages.visitor.payment_form', compact('inma', 'depo'));
    }
}
