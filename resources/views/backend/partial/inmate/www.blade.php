@extends('backend.master')
@section('content')
<h1>Inmate Details</h1>
<link rel="stylesheet" href="{{url('/backend/css/inmate.css')}}">
<div class="container mt-5 mb-5 ">
    <div class="card p-5" style="width:100%; height:100%">
        <div class=" image">
            <button class="btn btn-secondary">
                <img src="{{url('/backend/uploads',$inma->image)}}" height="100" width="100" />
            </button>
            <div>
              <div class="container"><b>Name</b> <span >{{$inma->name}}</span>
            </div>
            </div>
            <div>
              <div class="container"><b>Address:</b> <span >{{$inma->address}}</span>
            </div>
            <div>
              <div class="container"><b>Phone Number:</b> <span >{{$inma->phone}}</span>
            </div>
            <div>
              <div class="container"><b>Case Details:</b> <span >{{$inma->case}}</span>
            </div>
            <div>
              <div class="container"><b>Emmergency Contact Details:</b> <span >{{$inma->ecd}}</span>
            </div>
            <div>
              <div class="container"><b>Punishments:</b> <span >{{$inma->punishment}}</span>
            </div>  
           
             
        </div>
    </div>
</div>









@endsection