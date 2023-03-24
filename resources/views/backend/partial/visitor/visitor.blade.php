@extends('backend.master')
@section('content')
<div class="container mt-5">
  <div class="form-group" class="container"></div>
  <br>

  <table class="table">
    <thead class="bg-secondary">
      <tr>
        <th scope="col">No</th>
        <th scope="col">First_Name</th>
        <th scope="col">Last_Name</th>
        <th scope="col">Image</th>
        <th scope="col">Date of Birth</th> 

        <th scope="col">Address</th> 
        <th scope="col">Phone</th>
        <th scope="col">Country</th>
        <th scope="col">Religon</th>
        <!-- <th scope="col">Nid</th>
        <th scope="col">Gender</th>
        <th scope="col">Relation</th> -->
       

        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($vis as $key=>$data)
      <tr>
        <th scope="row">{{$vis->firstItem()+$key}}</th>
        <td>{{$data->first_name}}</td>
        <td>{{$data->last_name}}</td>
        <td><img  src="{{url('/frontend/slider/'.$data->image)}}" alt="image" height="80px" width="auto"></td>
        <td>{{$data->dob}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->number}}</td>
        <td>{{$data->country}}</td>
        <td>{{$data->religon}}</td>
        <!-- <td>{{$data->nid}}</td>
        <td>{{$data->gender}}</td>
        <td>{{$data->relation}}</td> -->

        <td>
          <a href="" class="btn btn-primary">Delete</a>

          <a href="" class="btn btn-warning">Confirm</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$vis->links()}}



@endsection