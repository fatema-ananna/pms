@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-primary" href="{{route('inmate_list')}}">Add Inmate</a></div>
<br>

<table class="table">
<thead class="bg-secondary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Inmate_Id</th>
      <th scope="col">First_Name</th>
      <th scope="col">Last_Name</th>
      <th scope="col">Image</th>
      <!-- <th scope="col">Date of Birth</th> -->
      
      <!-- <th scope="col">Address</th> -->
      <th scope="col">Nid</th>
     <!-- <th scope="col">ward </th>  -->
     <!-- <th scope="col">ward_type </th> -->
           <th scope="col">cell_id </th> 
       <!-- <th scope="col">Country</th> -->
      <!-- <th scope="col">Religon</th> -->
     
    
       <th scope="col">Gender</th> 
       <!-- <th scope="col">Punishment</th>  -->
       <!-- <th scope="col">Relatives Name</th>
       <th scope="col">Relatives Number</th>
        <th scope="col">Relation</th> -->


      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($inma as $key=>$data)

    <tr>
    <th scope="row">{{$inma->firstItem()+$key}}</th>
    <td>{{$data->inmate_id}}</td>
      <td>{{$data->first_name}}</td>
      <td>{{$data->last_name}}</td>
      <td><img  src="{{url('/backend/uploads/'.$data->image)}}" alt="image" height="80px" width="auto"></td>
      <!-- <td>{{$data->dob}}</td> -->
      <!-- <td>{{$data->address}}</td> -->
      <td>{{$data->nid}}</td>
      <!-- <td>{{$data->religon}}</td> -->
       
      <!-- <td>{{$data->ward->ward_type}}</td> -->
       <td>{{$data->cell->id}}</td>  
         <!-- <td>{{$data->ward->name}}</td>  -->
         <td>{{$data->gender}}</td> 
     
      <!-- <td>{{$data->relative_name}}</td>  -->
      <!-- <td>{{$data->relative_number}}</td>
      <td>{{$data->relation}}</td>
       
     <td>{{$data->country}}</td> -->

      <td> 
        <a href="{{route('inmate.view',$data->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('inmate.delete',$data->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{route('inmate.edit',$data->id)}}" class="btn btn-warning">Edit</a>
        <a href="{{route('case_list',$data->id)}}" class="btn btn-danger">Add Case</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$inma->links()}}



@endsection