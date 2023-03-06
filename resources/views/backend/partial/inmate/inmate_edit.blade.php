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
  <label >First_Name</label>
  <input type="text" class="form-control" name="first_name" placeholder="Enter Inmate first_Name" value="{{$inma->first_name}}">
</div>
<div class="mb-2">
  <label >Last_Name</label>
  <input type="text" class="form-control" name="last_name" placeholder="Enter Inmate last Name" value="{{$inma->last_name}}">
</div>
<div>
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image"value="{{$inma->image}}">
    </div>
<div class="mb-2">
  <label > Dob</label>
  <input type="date" class="form-control" name="dob" placeholder="Enter Inmate Date of Birth" value="{{$inma->dob}}">
</div>
<div class="mb-2">
  <label > Address</label>
  <input type="text" class="form-control" name="address" placeholder="Enter Inmate Address" value="{{$inma->address}}">
</div>
<div class="mb-2">
  <label > Phone</label>
  <input type="tel" class="form-control" name="phone" placeholder="Enter Inmate phone number" value="{{$inma->phone}}">
</div>
<div class="form-group" name="gender" value="{{$inma->gender}}">
            <label >Gender</label>
            <select name="gender" id="" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
         
            </select>

<div class="form-group" name="religon" value="{{$inma->religon}}">
            <label >Religon</label>
            <select name="religon" id="" class="form-control">
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Others">Others</option>
         
            </select>
</div>
<div class="form-group col-md-6">
    <label ><b>Ward</b></label>
    <select name="ward_id" id="" class="form-control">

    @foreach($wards as $ward)
        <option value="{{$ward->id}}">{{$ward->id}}</option>
    @endforeach
    </select>
</div>
<div class="mb-2">
  <label >Relatives_Name</label>
  <input type="text" class="form-control" name="relatives_name" value="{{$inma->relatives_name}}">
</div>
<div class="mb-2">
  <label >Relatives_Number</label>
  <input type="text" class="form-control" name="relatives_number"  value="{{$inma->relatives_number}}">
</div>
<div class="mb-2">
  <label >Relation</label>
  <input type="text" class="form-control" name="relation" value="{{$inma->relation}}" >
</div>
<div class="mb-2">
  <label >Country</label>
  <input type="text" class="form-control" name="country"  value="{{$inma->country}}" >
</div>
<div class="mb-2">
  <label > Punishment</label>
  <input type="text" class="form-control" name="punishment" placeholder="Enter Inmate Name"  value="{{$inma->punishment}}">
  <div class="mb-2">
  <label > Activity</label>
  <input type="date" class="form-control" name="activity" placeholder="Enter Inmate Date of Birth"  value="{{$inma->activity}}">
</div>
</div>

<input type="submit" name="submit" class="mt-3 btn btn-info" value="update">


</form>

@endsection