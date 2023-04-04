@extends('backend.master')
@section('content')
<div class="container my-5">

  <h3> Update Notice Here</h3>
<form action="{{route('notice.update',$not->id)}}" method="post" enctype="multipart/form-data">
@method('put')

@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Notice_Name</b> </label>
  <input type="text" class="form-control" name="name" value="{{$not->name}}">
</div>

<div class="form-row">
<div class="form-group col-md-6">
        <label for="pdf"><b>Upload PDF</b></label>
        <input type="file"  class="form-control" name="pdf">
    </div>


<input type="submit" name="submit" class="mt-3 btn btn-info" value="update">


</form>
</div>

@endsection