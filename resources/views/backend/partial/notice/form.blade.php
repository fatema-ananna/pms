@extends('backend.master')
@section('content')
<div class="container my-5">

  <h3> Upload Notice Here</h3>
<form action="{{route('notice.store')}}" method="post" enctype="multipart/form-data">


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Notice_Name</b> </label>
  <input type="text" class="form-control" name="name">
</div>

<div class="form-row">
<div class="form-group col-md-6">
        <label for="pdf"><b>Upload PDF</b></label>
        <input type="file"  class="form-control" name="pdf">
    </div>


<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection