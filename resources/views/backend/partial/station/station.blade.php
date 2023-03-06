@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('list')}}">Add Police Station</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Image</th> -->
      <th scope="col">Phone</th>
      <th scope="col">Postal Code</th>
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
      <td>{{$data->postal_code}}</td>
     <td><img src="{{url('/backend/uploads/station/ramganj-police-station_1.jpg',$data->image)}}" alt="image" height="100px" width="auto"></td>

      <td>{{$data->zilla}},{{$data->thana}}</td>
      
      <td> 
        <a href="{{route('station.view',$data->id)}}" class="btn btn-primary">View</a>
     
        <a href="{{route('station.edit',$data->id)}}" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$pols->links()}}



@endsection