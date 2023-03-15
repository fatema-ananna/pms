@extends('backend.master')
@section('content')
<div class="container">
  <h1> Register Here</h1>
<form action="{{route('punishment_store')}}" method="post" >


@if($errors->any())
    @foreach($errors->all() as $message)
    <p class="alert alert-danger">{{$message}}</p>
    @endforeach
    @endif

@csrf

<div class="form-row">
<div class="form-group col-md-6">
  <label ><b>Punishment_Name</b> </label>
  <input type="text" class="form-control" name="name">
</div>
<div class="form-group col-md-6">
            <label ><b>Punishment_Type</b></label>
            <select name="type" id="" class="form-control" autocomplete="off">
                <option value="rigorous imprisonment">Rigorous imprisonment</option>
                <option value="simple imprisonment">simple imprisonment</option>
            </select>
</div>



<input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">


</form>
</div>

@endsection