@extends('backend.master')
@section('content')
<div class="container">
  <h1>Inmate Registration Form</h1>
<form action="{{route('inmate_list_store')}}" method="post" enctype="multipart/form-data">


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>First_Name</b> </label>
  <input type="text" class="form-control" name="first_name">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label > <b>Last_Name</b></label>
  <input type="text" class="form-control" name="last_name">
</div>
<div class="form-row">
<div class="form-group col-md-6">
        <label for="image"><b>Image</b></label>
        <input type="file" class="form-control" name="image">
    </div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Date of Birth</b></label>
  <input type="date" class="form-control" name="dob">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Address</b></label>
  <input type="text" class="form-control" name="address">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Phone</b></label>
  <input type="tel" class="form-control" name="phone">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Country</b></label>
  <input type="text" class="form-control" name="country" >
</div>
<div class="form-row" name="religon">
<div class="form-group col-md-6">
            <label ><b>Religon</b></label>
            <select name="religon" id="" class="form-control">
                <option value="islam">Islam</option>
                <option value="hindu">Hindu</option>
                <option value="Others">Others</option>
         
            </select>
</div>
<div class="form-row" name="gender">
<div class="form-group col-md-6">
            <label ><b>Gender</b></label>
            <select name="gender" id="" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
         
            </select>
</div>


<div class="form-group col-md-6">
    <label ><b>Ward</b></label>
    <select name="ward_id" id="" class="form-control">

    @foreach($wards as $ward)
        <option value="{{$ward->id}}">{{$ward->name}}</option>
    @endforeach
    </select>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Case</b></label>
  <input type="text" class="form-control" name="case">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Relatives Name</b></label>
  <input type="text" class="form-control" name="relatives_name">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Relatives Number</b></label>
  <input type="text" class="form-control" name="relatives_number" >
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Relation</b></label>
  <input type="text" class="form-control" name="relation" >
</div>
<div class="form-row">
<div class="form-group col-md-4">
  <label > <b>Punishment</b></label>
  <input type="text" class="form-control" name="punishment">
</div>
<div class="form-row">
<div class="form-group col-md-2">
  <label ><b>Activity</b></label>
  <input type="text" class="form-control" name="activity" >
</div>

<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection