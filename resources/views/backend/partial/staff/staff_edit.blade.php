@extends('backend.master')
@section('content')
<div class="container">
  <h1>Staff Registration Form</h1>
<form action="{{route('update.staff',$sta->id)}}" method="post" enctype="multipart/form-data">

@method('put')
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
  <label ><b>Date Of Birth</b></label>
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
  <label ><b>Nic</b></label>
  <input type="number" class="form-control" name="nic" >
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
  <label ><b>Designation</b></label>
  <input type="text" class="form-control" name="designation">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Assign_in</b></label>
  <input type="text" class="form-control" name="assign_in">
</div>



<input type="submit" name="submit" class="mt-3 btn btn-info" value="update">


</form>
</div>

@endsection