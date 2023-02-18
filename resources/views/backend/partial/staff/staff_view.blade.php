@extends('backend.master')
@section('content')
<link rel="stylesheet" href="{{url('/backend/css/inmate.css')}}">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-square mt-5" width="200px" src="{{url('/backend/uploads/staff/',$sta->image)}}"></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Staff Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First_Name</label><input type="text" class="form-control"  value="{{$sta->first_name}}"></div>

                    <div class="col-md-6"><label class="labels">Last_Name</label><input type="text" class="form-control" value="{{$sta->last_name}}"></div>
                </div>
                
                <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" value="{{$sta->gender}}">
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Date Of Birth</label><input type="text" class="form-control"  value="{{$sta->dob}}">
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Phone</label><input type="tel" class="form-control"  value="{{$sta->phone}}">
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">NIC</label><input type="tel" class="form-control"  value="{{$sta->nic}}">
                </div>

                    <div class="col-md-12"><label class="labels">Address </label><input type="text" class="form-control" placeholder="enter address " value="{{$sta->address}}"></div>

                    <div class="col-md-12"><label class="labels">Religon</label><input type="text" class="form-control" value="{{$sta->religon}}"></div>


                    <div class="col-md-12"><label class="labels">Designation</label><input type="text" class="form-control" value="{{$sta->designation}}"></div>

                    <div class="col-md-12"><label class="labels">Assign_in</label><input type="text" class="form-control" value="{{$sta->assign_in}}"></div>

                   
            

                  
                <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button"></button></div> -->
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection