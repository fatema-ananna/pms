@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-primary" href="{{route('list')}}">Add Police Station</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Image</th>
      <th scope="col">Location</th>
      
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($pols as $key=>$data)
    <tr>
    <th scope="row">{{$pols->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->phone}}</td>
      <td><img  src="{{url('/backend/uploads/'.$data->image)}}" alt="image" height="80px" width="auto"></td>

      <td>{{$data->zilla}},{{$data->thana}}</td>
      
      <td> 
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-danger">Delete</a>
        <a href="{{route('station.edit',$data->id)}}" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$pols->links()}}



@endsection