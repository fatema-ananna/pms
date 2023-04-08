@extends('backend.master')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Inmate_Id</th>
      <th scope="col">Inmate_Name</th>
      <th scope="col">Deposit Amount</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">1</th>
      <td>{{$depo->inmate_id}}</td>
      <td>{{$inma->first_name}} {{$inma->last_name}}</td>
      <td>{{$depo!==null?$depo?->available_amount:0}}</td>
    </tr>

  
  </tbody>
</table>













@endsection