<?php

namespace App\Http\Controllers\frontend;

use App\Models\Visitor;
use App\Models\FrontendAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inmate;
use App\Models\InmateDeposit;
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function visitor()
    {
        // dd(now()->format("M"));
        $visitors = Visitor::where('frontend_auth_id', auth('frontendAuth')->user()->id)->paginate(2);

        if (!$visitors) $visitors = collect([]);
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
        $req->validate(
            [
                "number" => "digits:11|required|unique:visitor,number"
            ]
        );


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
        $req->validate(
            [
                "dob" => 'required|date|before:2002-04-15',
                "number" => "digits:11|required|unique:visitors,number"
            ]
        );
        //dd($req->all());

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
            "religon" => $req->religon,
            "nid" => $req->nid,
            "gender" => $req->gender,
            "relation" => $req->relation,
            "status" => "pending"


        ]);
        toastr()->success('successfully Done');
        return redirect()->route('frontend.visitor')->with('message', 'Appointment successfully created');
    }
    public function visitor_status(Request $req, $id)
    {

        $visitor = Visitor::find($id);
        $visitor->update(["status" => $req->status]);
        return redirect()->back();
    }
    public function paymentForm()
    {
        // 20230405040402
        $inma = Inmate::where('inmate_id', auth('frontendAuth')->user()->inmate_id)->first();
        $depo = InmateDeposit::where('inmate_id', auth('frontendAuth')->user()->inmate_id)->first();
        // dd($depo);
        // where("inmate_id",auth()->user()->inmate_id);
        // dd($inma);
        return view('frontend.pages.visitor.payment_form', compact('inma', 'depo'));
    }
}
