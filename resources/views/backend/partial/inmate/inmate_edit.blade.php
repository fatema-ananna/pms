@extends('backend.master')
@section('content')
<h1>Update Inmate</h1>
<form action="{{route('inmate.update',$inma->id)}}" method="post" enctype="multipart/form-data">

@method('put')
@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="mb-2">
  <label ><b>First_Name</b></label>
  <input type="text" class="form-control" name="first_name" placeholder="Enter Inmate first_Name" value="{{$inma->first_name}}">
</div>
<div class="mb-2">
  <label ><b>Last_Name</b></label>
  <input type="text" class="form-control" name="last_name" placeholder="Enter Inmate last Name" value="{{$inma->last_name}}">
</div>
<div>
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image"value="{{$inma->image}}">
    </div>
<div class="mb-2">
  <label ><b>Dob</b></label>
  <input type="date" class="form-control" name="dob" placeholder="Enter Inmate Date of Birth" value="{{$inma->dob}}">
</div>
<div class="mb-2">
  <label ><b>Address</b></label>
  <input type="text" class="form-control" name="address" placeholder="Enter Inmate Address" value="{{$inma->address}}">
</div>
<div class="mb-2">
  <label ><b>Nid</b></label>
  <input type="tel" class="form-control" name="nid" placeholder="Enter Inmate phone number" value="{{$inma->phone}}">
</div>
<div class="form-group" name="gender" value="{{$inma->gender}}">
            <label ><b>Gender</b></label>
            <select name="gender" id="" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
         
            </select>

<div class="form-group" name="religon" value="{{$inma->religon}}">
            <label ><b>Religon</b></label>
            <select name="religon" id="" class="form-control">
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Others">Others</option>
         
            </select>
</div>
<div class="form-group col-md-6">
    <label ><b><b>Ward</b></b></label>
    <select name="ward_id" id="" class="form-control" value="{{$inma->ward_id}}>

    @foreach($wards as $ward)
        <option value="{{$ward->id}}">{{$ward->id}}</option>
    @endforeach
    </select>
</div>
<div class="mb-2">
  <label ><b>Relatives_Name</b></label>
  <input type="text" class="form-control" name="relatives_name" value="{{$inma->relatives_name}}">
</div>
<div class="mb-2">
  <label ><b>Relatives_Number</b></label>
  <input type="text" class="form-control" name="relatives_number"  value="{{$inma->relatives_number}}">
</div>
<div class="mb-2">
  <label ><b>Relation</b></label>
  <input type="text" class="form-control" name="relation" value="{{$inma->relation}}" >
</div>
<div class="mb-2">
  <label ><b>Country</b></label>
  <input type="text" class="form-control" name="country"  value="{{$inma->country}}" >
</div>
<!-- <div class="mb-2">
  <label > Punishment</label>
  <input type="text" class="form-control" name="punishment" placeholder="Enter Inmate Name"  value="{{$inma->punishment}}">
  <div class="mb-2">
  <label > Activity</label>
  <input type="text" class="form-control" name="activity" placeholder="Enter Inmate Date of Birth"  value="{{$inma->activity}}">
</div>
</div> -->

<input type="submit" name="submit" class="mt-3 btn btn-info" value="update">


</form>

@endsection