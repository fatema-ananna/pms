@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('punishment_list')}}">Add Punishment</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Punishment_Name</th>
    <th scope="col">Punishment_Type</th>
    <!-- <th scope="col">Punishment_Duration</th> -->
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($punish as $key=>$data)
    <tr>
    <th scope="row">{{$punish->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->type}}</td>
      
     
      
      <td> 
        <!-- <a href="" class="btn btn-primary">View</a> -->
        <a href="" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$punish->links()}}



@endsection