@extends('frontend.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>
<body>
    <div class="container mx-auto mt-5 py-5 ">
@if(session()->has('message'))
                <p class="alert alert-danger">{{session()->get('message')}}</p>
                @endif

<form action="{{route('frontend.visitor.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1"><b>First Name</b></label>
    <input type="text" class="form-control" id="" name="first_name" value="{{auth('frontendAuth')->user()->first_name}}" placeholder="Enter your first name">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Last Name</b> </label>
    <input type="text" class="form-control" id="" name="last_name" placeholder="Enter your last name" value="{{auth('frontendAuth')->user()->last_name}}">

  </div>
  <div class="form-group">
    <label><b>Image</b></label>
    <input type="file" class="form-control" id="" name="image" >

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Address</b></label>
    <input type="text" class="form-control" id="" name="address" placeholder="Enter your address">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Phone</b></label>
    <input type="number" class="form-control" id="" name="number" placeholder="Enter your number">

  </div>
  <div class="form-group">
    <label for=""><b>Inmate_Id</b></label>
    <input type="text" class="form-control" id="" name="inmate_id" placeholder="Enter inmate id" value="{{auth('frontendAuth')->user()->inmate_id}}">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Relation With Inmate</b></label>
    <input type="text" class="form-control" id="" name="relation" placeholder="Enter relationthip with inmate">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Email</b></label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Your Email" value="{{auth('frontendAuth')->user()->email}}">
  </div>
  <div class="form-group" class="col-md-4 ">
    <label for="exampleInputPassword1"><b>Password</b></label>
    <input type="password" class="form-control" name="password" placeholder="Enter Your password">
  </div>
  
  <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
</form>
</div>
</body>
</html>
@endsection