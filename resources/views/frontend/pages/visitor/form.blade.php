@extends('backend.master')
@section('content')
<div class="container">
  <h1>Visitor Appointment Form</h1>
<form action="{{route('visitor_list_store')}}" method="post" enctype="multipart/form-data">


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>First_Name</b> </label>
  <input type="text" required name="first_name" class="form-control" name="first_name">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label > <b>Last_Name</b></label>
  <input type="text" class="form-control" name="last_name">
</div>
<div class="form-row">
<div class="form-group col-md-6">
        <label for="image"><b>Image</b></label>
        <input type="file" required image="image" class="form-control" name="image">
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
  <label ><b>Nid</b></label>
  <input type="tel" required nid="nid" class="form-control" name="nid">
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
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Phone</b></label>
  <input type="number" class="form-control" name="number" >
</div>


<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Relatives With Inmate</b></label>
  <input type="text" class="form-control" name="relation">
</div>





<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection