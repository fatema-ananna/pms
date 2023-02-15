@extends('backend.master')
@section('content')
<link rel="stylesheet" href="{{url('/backend/css/inmate.css')}}">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-square mt-5" width="200px" src="{{url('/backend/uploads',$inma->image)}}"></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Inmate Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First_Name</label><input type="text" class="form-control" placeholder="name" value="{{$inma->first_name}}"></div>
                    
                    <div class="col-md-6"><label class="labels">Last_Name</label><input type="text" class="form-control" value="{{$inma->last_name}}" placeholder="last_name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{$inma->phone}}"></div>

                    <div class="col-md-12"><label class="labels">Address </label><input type="text" class="form-control" placeholder="enter address " value="{{$inma->address}}"></div>

                    <div class="col-md-12"><label class="labels">Religon</label><input type="text" class="form-control"value="{{$inma->religon}}"></div>


                    <div class="col-md-12"><label class="labels">Country</label><input type="text" class="form-control"value="{{$inma->country}}"></div>

                    <div class="col-md-12"><label class="labels">Case Details</label><input type="text" class="form-control"value="{{$inma->case}}"></div>

                    <div class="col-md-12"><label class="labels">Punishment</label><input type="text" class="form-control"  value="{{$inma->punishment}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="{{$inma->country}}"></div>

                     <h4>Emergency Contact Details</h4>
                    <div class="col-md-12"><label class="labels">Relatives_Name</label><input type="text" class="form-control"  value="{{$inma->relatives_name}}"></div>
                    
                    <div class="col-md-12"><label class="labels">Relatives_Number</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{$inma->relatives_number}}"></div>

                    <div class="col-md-12"><label class="labels">Relation</label><input type="text" class="form-control" placeholder="enter email id" value="{{$inma->relation}}"></div>

               <div class="col-md-6"><label class="labels">Activity</label><input type="text" class="form-control" value="{{$inma->activity}}"></div>
                </div>
                <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button"></button></div> -->
            </div>
        </div>
    
    </div>
</div>
</div>
</div>
@endsection