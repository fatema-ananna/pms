@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('notice.form')}}">Add Notice</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">pdf</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($not as $key=>$data)
    <tr>
    <th scope="row">{{$not->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td><a href="{{url('/backend/pdf/'.$data->pdf)}}" alt="pdf" >view pdf</a>
      <td> 
   
   <a href="{{route('notice.edit',$data->id)}}" class="btn btn-warning">Edit</a>
   <a href="{{route('notice.delete',$data->id)}}" class="btn btn-warning">Delete</a>
   </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</div>
{{$not->links()}}



@endsection