@extends('backend.master')
@section('content')
<div class="container">
  <h1> Register Here</h1>
<form action="{{route('crime_store')}}" method="post" enctype="multipart/form-data">


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Crime_Name</b> </label>
  <input type="text" required name="name" class="form-control" name="name">
</div>
<div class="form-group col-md-6">
            <label ><b>Status</b></label>
            <select name="status" id="" class="form-control">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
             
         
            </select>
</div>


<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection