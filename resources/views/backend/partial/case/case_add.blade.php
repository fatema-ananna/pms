@extends('backend.master')
@section('content')
<div class="container">
  <h1>Case Registration Form</h1>
<form action="{{route('case_store')}}" method="post" enctype="multipart/form-data">


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-group col-md-6">
    <label ><b>Inmate_Id</b></label>
    <select name="inmate_id" id="" class="form-control">

    @foreach($inmates as $inmate)
        <option value="{{$inmate->id}}">{{$inmate->name}}</option>
    @endforeach
    </select>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>First_Name</b> </label>
  <select name="inmate_first_name" id="" class="form-control">

@foreach($inmates as $inmate)
    <option value="{{$inmate->first_name}}">{{$inmate->first_name}}</option>
@endforeach
</select>
</div>
<div class="form-group col-md-6">
  <label ><b>last_Name</b> </label>
  <select name="inmate_last_name" id="" class="form-control">

@foreach($inmates as $inmate)
    <option value="{{$inmate->last_name}}">{{$inmate->last_name}}</option>
@endforeach
</select>
</div>

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Court_of_Comittal</b></label>
  <input type="text" class="form-control" name="court">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Crime_Type</b></label>
  <input type="text" class="form-control" name="crime_type">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Case_Start_Date</b></label>
  <input type="date" class="form-control" name="case_start">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Date_of_Crime</b></label>
  <input type="date" class="form-control"name="date" >
</div>

<div class="form-group col-md-6">
    <label ><b>police_station</b></label>
    <select name="police_station_id" id="" class="form-control">

    @foreach($police_stations as $police_station)
        <option value="{{$police_station->id}}">{{$police_station->name}}</option>
    @endforeach
    </select>
</div>

</div>



<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection