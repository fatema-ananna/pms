@extends('backend.master')
@section('content')
<div class="form-group" class="container"><a class="btn btn-primary" href="{{route('staff_add')}}">Add Staff</a></div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">First_Name</th>
      <th scope="col">Last_Name</th>
      <th scope="col">Image</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Nic</th>
      <th scope="col">Religon</th>
      <th scope="col">Designation</th>
      <th scope="col">Gender</th>
      <th scope="col">Assign_in</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sta as $key=>$data)
    <tr>
      <th scope="row">{{$sta->firstItem()+$key}}</th>
      <td>{{$data->first_name}}</td>
      <td>{{$data->last_name}}</td>
      <td><img src="{{url('/backend/uploads/staff/'.$data->image)}}" alt="image" height="80px" width="auto"></td>
      <td>{{$data->age}}</td> -->
      <td>{{$data->address}}</td> 
      <td>{{$data->phone}}</td>
      <td>{{$data->religon}}</td>
      <td>{{$data->gender}}</td>
      <td>{{$data->nic}}</td>
      <td>{{$data->designation}}</td>
      <td>{{$data->assign_in}}</td>


      <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-danger">Delete</a>
        <a href="" class="btn btn-warning">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$sta->links()}}

@endsection


