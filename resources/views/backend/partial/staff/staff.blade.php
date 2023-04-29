@extends('backend.master')
@section('content')

<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('staff_add')}}">Add Staff</a></div>
<br>

<table class="table">
  <thead class="bg-secondary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">First_Name</th>
      <th scope="col">Last_Name</th>
      <th scope="col">Image</th>
      <th scope="col">Email</th>
      
      <th scope="col">Role</th>
      <!-- <th scope="col">Date Of Birth</th>
      <th scope="col">Address</th> -->
      <!-- <th scope="col">Phone</th>
      <th scope="col">Nic</th>
      <th scope="col">Religon</th>
      <th scope="col">Designation</th>
      <th scope="col">Gender</th>
      <th scope="col">Assign_in</th> -->
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
      <td>{{$data->user->email}}</td>
      <td>{{$data->user->role_id}}</td>
      <!-- <td>{{$data->dob}}</td>  -->
      <!-- <td>{{$data->address}}</td>  -->
      <td>{{$data->phone}}</td>
     
      
     
 
      <!-- <td>{{$data->phone}}</td>
      <td>{{$data->religon}}</td>
      <td>{{$data->gender}}</td>
      <td>{{$data->nic}}</td>
      <td>{{$data->designation}}</td>
      <td>{{$data->assign_in}}</td> -->


      <td>
        <a href="{{route('staff.view',$data->id)}}" class="btn btn-primary">View</a>
      
        <a href="{{route('delete.staff',$data->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{route('staff.edit',$data->id)}}" class="btn btn-primary">Edit</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
{{$sta->links()}}

@endsection


