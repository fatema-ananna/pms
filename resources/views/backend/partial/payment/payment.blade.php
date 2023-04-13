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

    <tr>
      @foreach($depo as $key=>$data)

      @dd($data->inmate)
      <th scope="row">{{$key + 1}}</th>
      <td>{{$data?->inmate_id}}</td>
      <td>{{$data->inmate->first_name}} {{$data->inmate->last_name}}</td>
      <td>{{$data->available_amount}}</td>
      @endforeach
    </tr>

  
  </tbody>
</table>


@endsection