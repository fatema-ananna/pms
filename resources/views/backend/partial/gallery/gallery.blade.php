@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('gallery.form')}}">Add Picture</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Picture_Name</th>
      <th scope="col">Image</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($gallery as $key=>$data)
    <tr>
    <th scope="row">{{$gallery->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td><img  src="{{url('/frontend/gallery.picture/'.$data->image)}}" alt="image" height="80px" width="auto"></td>
      <td> 
   
   <a href="{{route('pic.edit',$data->id)}}" class="btn btn-warning">Edit</a>
   </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</div>
{{$gallery->links()}}



@endsection