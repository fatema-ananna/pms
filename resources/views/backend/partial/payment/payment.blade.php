@extends('backend.master')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Inmate_Id</th>
      <th scope="col">Inmate_Name</th>
      <th scope="col">Total Amount</th>
    </tr>
  </thead>
  <tbody>

    @foreach($depo as $key=>$data)
    @if($data->inmate != null)
    <tr>
      
      <th scope="row">{{$key + 1}}</th>
      <td>{{$data->inmate_id}}</td>
      <td>{{$data->inmate->name}}</td>
      <td>{{$data->available_amount}}</td>
    </tr>
    @endif
    @endforeach

  
  </tbody>
</table>


@endsection