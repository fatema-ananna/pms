@extends('frontend.master')
@section('content')


{{--
 @dd(auth('frontendAuth')->user())  --}}



<div class="container mt-5 pt-5" style="min-height: 80vh;">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Inmate Id</th>
   
      <th scope="col">{{(auth('frontendAuth')->user()->inmate_id)}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Inmate Name</th>
      <td>{{$inma->first_name}} {{$inma->last_name}}</td>
      
      
    </tr>
    <tr>
      <th scope="row">Available Amount</th>
      <td>{{$depo!==null?$depo?->available_amount:0}}</td>     
    </tr>
    

  
  </tbody>
</table>
  <form action="{{route('pay.now')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Inmate Id</label>
      <input type="text" class="form-control" name="id" value="{{(auth('frontendAuth')->user()->inmate_id)}}" readonly>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Deposit Money</label>
      <input type="number" class="form-control" name="money" placeholder=" You Can Deposite {{$depo !==null ? 5000 - $depo->available_amount : 5000}}" max="{{$depo !==null ? 5000 - $depo->available_amount : 5000}}" min="1">
    </div>

    <button type="submit" class="btn btn-primary">Deposit</button>
  </form>
</div>


@endsection