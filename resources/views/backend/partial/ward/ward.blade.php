@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('ward_list')}}">Add Ward</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Ward_Name</th>
      <th scope="col">Ward_Type</th>
      <th scope="col">Cell_no</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($ward as $key=>$data)
    <tr>
    <th scope="row">{{$ward->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->ward_type}}</td>
      <td>{{$data->cell_no}}</td>
      <td>{{$data->status}}</td>
     
     
      
      <td> 
        <!-- <a href="" class="btn btn-primary">View</a> -->
     
        <a href="{{route('ward_edit',$data->id)}}" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$ward->links()}}



@endsection