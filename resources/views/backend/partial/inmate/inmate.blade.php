@extends('backend.master')
@section('content')
<a class="btn btn-success" href="{{route('inmate_list')}}">Add Inmate</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Dob</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Case</th>
      <th scope="col">Ecd</th>
      <th scope="col">Punishment</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($inma as $key=>$data)
    <tr>
      <th scope="row"></th>
      <td>{{$data->name}}</td>
      <td><img width="100px" src="{{url('/backend/uploads/'.$data->image)}}" alt="image"></td>
      <td>{{$data->dob}}</td>
      <td>{{$data->address}}</td>
      <td>{{$data->phone}}</td>
      <td>{{$data->gender}}</td>
      <td>{{$data->case}}</td>
      <td>{{$data->ecd}}</td>
      <td>{{$data->punishment}}</td>
      <td>
        <a href="{{route('inmate.view',$data->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('inmate.delete',$data->id)}}" class="btn btn-danger">Delete</a>
        <a href="" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>



@endsection