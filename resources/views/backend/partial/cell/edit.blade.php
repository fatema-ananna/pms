@extends('backend.master')
@section('content')
<div class="container">
  <h1> Update Here</h1>
<form action="{{route('cell.update',$cell->id)}}" method="post" enctype="multipart/form-data">
@method('put')

@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>cell_no</b> </label>
  <input type="number" class="form-control" name="cell_no">
</div>


<div class="form-group col-md-6">
    <label ><b>Ward_name</b></label>
    
    <select name="ward_id" id="" class="form-control">
                @foreach($ward as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
             
                @endforeach
            </select>
</div>

<div class="form-group col-md-6">
            <label ><b>Status</b></label>
            <select name="status" id="" class="form-control">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
</div>



<input type="submit" class="mt-3 btn btn-info" value="update">


</form>
</div>

@endsection