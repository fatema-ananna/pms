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
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="name" value="{{$inma->name}}"></div>
                    
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{$inma->phone}}"></div>

                    <div class="col-md-12"><label class="labels">Address </label><input type="text" class="form-control" placeholder="enter address " value="{{$inma->address}}"></div>

                    

                    <div class="col-md-12"><label class="labels">Case Details</label><input type="text" class="form-control"value="{{$inma->case}}"></div>
                    <div class="col-md-12"><label class="labels">Punishment</label><input type="text" class="form-control"  value="{{$inma->punishment}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                     <h4>Emergency Contact Details</h4>
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control"  value="{{$inma->ecd}}"></div>
                    <div class="col-md-12"><label class="labels">Number</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{$inma->ecd}}"></div>
                    <div class="col-md-12"><label class="labels">Relation</label><input type="text" class="form-control" placeholder="enter email id" value="{{$inma->ecd}}"></div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    
    </div>
</div>
</div>
</div>
@endsection