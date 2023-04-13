<?php

namespace App\Http\Controllers;

use App\Models\Inmate;
use App\Models\InmateDeposit;
use App\Models\Visitor;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(){
        $depo=InmateDeposit::all();
        return view('backend.partial.payment.payment',compact('depo'));
    }
}
