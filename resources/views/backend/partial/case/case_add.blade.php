@extends('backend.master')
@section('content')
<div class="container">
  <h1>Case Registration Form</h1>
  <form action="{{route('case_store')}}" method="post" enctype="multipart/form-data">
  @csrf

    @if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif
    

    <div class="form-group col-md-6">
      <label><b>Inmate_Id</b></label>
      <input type="text" name="inmate_id" id="" value='{{$inmate->id}}' class="form-control"readonly>

    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
     
        <label><b>First_Name</b> </label>
        <input type="text" name="first_name" id="" value='{{$inmate->first_name}}' class="form-control"readonly>

      </div>
      
      <div class="form-group col-md-6">
        <label><b>last_Name</b> </label>
        <input type="text" name="last_name" id="" value='{{$inmate->last_name}}' class="form-control"readonly>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label><b>Court_of_Comittal</b></label>
          <input type="text" class="form-control" name="court">
        </div>
        <div class="form-group col-md-6">
                <label><b>crime_type</b></label>
                <select name="crime_id" id="" class="form-control">

                  @foreach($crimes as $data)
                  <option value="{{$data->id}}"> {{$data->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-row">
        <div class="form-group col-md-6">
          <label><b>Description</b></label>
          <input type="text" class="form-control" name="description">
        </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label><b>Case_Start_Date</b></label>
              <input type="date" class="form-control" name="case_start">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label><b>Date_of_Crime</b></label>
                <input type="date" class="form-control" name="date">
              </div>
              <div class="form-group col-md-6">
                <label><b>police_station</b></label>
                <select name="police_station_id" id="" class="form-control">

                  @foreach($police_stations as $data)
                  <option value="{{$data->id}}"> {{$data->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label><b>punishment</b></label>
                <select name="punishment_id" id="" class="form-control">

                  @foreach($punishments as $data)
                  <option value="{{$data->id}}"> {{$data->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-row" name="type">
         <div class="form-group col-md-6">
            <label ><b>Punishment_Type</b></label >
            <select name="type" id="" class="form-control">
                <option value="rigorous imprisonment">Rigorous Imprisonment</option>
                <option value="simple imprisonment">Simple Imprisonment</option>
             </select>
       </div>
       <div class="form-group col-md-6">
                <label><b>Activity</b></label>
                <select name="activity_id" id="" class="form-control">

                  @foreach($activities as $data)
                  <option value="{{$data->id}}"> {{$data->name}}</option>
                  @endforeach
                </select>
              </div>

            </div>
     <input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


  </form>
</div>

@endsection