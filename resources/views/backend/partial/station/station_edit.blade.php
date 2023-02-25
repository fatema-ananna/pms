@extends('backend.master')
@section('content')
<div class="container">
  <h1> Register Here</h1>
<form action="{{route('update.station',$pols->id)}}" method="post" enctype="multipart/form-data">

@method('put')
@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Station_Name</b> </label>
  <input type="text" class="form-control" name="name">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label > <b>Zilla</b></label>
  <input type="text" class="form-control" name="zilla">
</div>

<div class="form-group col-md-6">
  <label > <b>Thana</b></label>
  <input type="text" class="form-control" name="thana">
</div>

<div class="form-row">
<div class="form-group col-md-6">
        <label for="image"><b>Image</b></label>
        <input type="file" class="form-control" name="image">
    </div>

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Phone</b></label>
  <input type="tel" class="form-control" name="phone">
</div>

<input type="submit" name="submit" class="mt-3 btn btn-info" value="update">


</form>
</div>

@endsection