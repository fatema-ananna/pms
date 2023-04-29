@extends('backend.master')
@section('content')
<div class="container mt-5">
<div class="form-group" class="container"><a class="btn btn-success" href="{{route('cell_list')}}">Add cell</a></div>
<br>

<table class="table">
<thead class="bg-secondary text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cell No</th>
      <th scope="col">Ward Name</th>
      <th scope="col">IsBooked</th>
   
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($cells as $key=>$data)
 
    <tr>
    <th scope="row">{{$cells->firstItem()+$key}}</th>
      <td>{{$data->cell_no}}</td>
      <td>{{$data->ward->name}}</td>
      <td>{{$data->isBooked == 1? 'Yes': 'No'}}</td>
  
     
     
      
      <td> 
        <!-- <a href="" class="btn btn-primary">View</a> -->
     
        <a href="{{route('cell.edit',$data->id)}}" class="btn btn-warning">Edit</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$cells->links()}}



@endsection