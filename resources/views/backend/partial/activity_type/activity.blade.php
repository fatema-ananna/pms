@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('activity_list')}}">Add Activity</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Activity_Name</th>
      <th scope="col">Inmate_no</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($act as $key=>$data)
    <tr>
    <th scope="row">{{$act->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->inmate_no}}</td>
      <td>{{$data->status}}</td>
     
     
      
      <td> 
        <a href="" class="btn btn-primary">View</a>
     
        <a href="" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$act->links()}}



@endsection