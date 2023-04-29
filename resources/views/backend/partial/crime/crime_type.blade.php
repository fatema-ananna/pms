@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('crime_list')}}">Add Crime</a></div>
<br>

<table class="table">
<thead class="bg-secondary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($crim as $key=>$data)
    <tr>
    <th scope="row">{{$crim->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->status}}</td>
     
     
      
      <td> 
       
     
        <a href="{{route('crime.edit',$data->id)}}" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$crim->links()}}



@endsection