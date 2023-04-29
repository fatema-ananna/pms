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
        <label><b>First_Name</b> </label>
        <input type="text" required name="first_name" class="form-control" name="first_name">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label> <b>Last_Name</b></label>
        <input type="text" class="form-control" name="last_name">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="image"><b>Image</b></label>
        <input type="file" required image="image" class="form-control" name="image">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Date of Birth</b></label>
        <input type="date" class="form-control" name="dob">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Address</b></label>
        <input type="text" class="form-control" name="address">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Nid</b></label>
        <input type="tel" required nid="nid" class="form-control" name="nid">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Country</b></label>
        <input type="text" class="form-control" name="country">
      </div>
    </div>
    <div class="form-row" name="religon">
      <div class="form-group col-md-6">
        <label><b>Religon</b></label>
        <select name="religon" id="" class="form-control">
          <option value="islam">Islam</option>
          <option value="hindu">Hindu</option>
          <option value="Others">Others</option>

        </select>
      </div>
    </div>
    <div class="form-row" name="gender">
      <div class="form-group col-md-6">
        <label><b>Gender</b></label>
        <select name="gender" id="" class="form-control">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Others">Others</option>

        </select>
      </div>
    </div>

    <!-- <div class="form-group col-md-6">
      <label><b>Ward_Type</b></label>
      <select name="ward_id" id="" class="form-control">

        @foreach($wards as $ward)
        <option value="{{$ward->id}}">{{$ward->ward_type}}</option>

        @endforeach
      </select>
    </div> -->

    <div class="form-group col-md-6">
      <label><b>Ward</b></label>
      <select name="ward_id" id="ward_id" class="form-control">
        @foreach($wards as $ward)
        <option value="{{$ward->id}}">{{$ward->name}} ({{$ward->ward_type}})</option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-6">
      <label><b>Cell No</b></label>
      <select name="cell_id" id="cell_id" class="form-control"></select>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Relatives Name</b></label>
        <input type="text" class="form-control" name="relatives_name">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Relatives Number</b></label>
        <input type="text" class="form-control" name="relatives_number">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label><b>Relation</b></label>
        <input type="text" class="form-control" name="relation">
      </div>
    </div>
    <input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">
  </form>
</div>

@endsection

@section("scripts")

<script>
  $(document).ready(function() {
    $(document).on("change", "#ward_id", function() {
      const wardId = $(this).val();
      const cellId = $("#cell_id");
      $.ajax({
        url: "{{route('get.cells')}}",
        method: "POST",
        data: {
          wardId
        },
        success: function(res) {
          console.log(res)
          cellId.empty()
          if (res.length > 0) {
            cellId.append(`<option>Sellect a Cell</option>`)
            $.each(res, function(key, cell) {
              cellId.append(`<option value="${cell.id}">${cell.cell_no}</option>`)
            })
          } else {
            cellId.append(`<option>No Cell in this Word</option>`)
          }
        }
      })
    })
  })
</script>
@endsection