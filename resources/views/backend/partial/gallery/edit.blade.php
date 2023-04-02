@extends('backend.master')
@section('content')
<div class="container my-5">

  <h3> Update Here</h3>
<form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Picture_Name</b> </label>
  <input type="text" class="form-control" name="name" value="{{$gallery->name}}">

</div>

<div class="form-row">
<div class="form-group col-md-6">
        <label for="image"><b>Image</b></label>
        <input type="file" required image="image" class="form-control" name="image">
    </div>


<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection