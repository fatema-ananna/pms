@extends('backend.master')
@section('content')
<h1>Inmate Details</h1>
<link rel="stylesheet" href="{{url('/backend/css/inmate.css')}}">
<div class="container mt-6 mb-6  d-flex justify-content-center">
    <div class="card p-6">
        <div class=" image d-flex flex-column justify-content-center    align-items-center">
            <button class="btn btn-secondary">
                <img src="{{url('/backend/uploads',$inma->image)}}" height="100" width="100" />
            </button>
            <div>
            <span class="name mt-3">{{$inma->name}}</span></div>
            <div>
            <span class="idd">{{$inma->dob}}</span></div>

           <div> <span class="idd">{{$inma->address}}</span>
          
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd1">{{$inma->phone}}</span>
                <span><i class="idd1">{{$inma->gender}}</i></span>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center mt-3">
            <span><i class="idd1">{{$inma->case}}</i></span>
            <span><i class="idd1">{{$inma->ecd}}</i></span>
            <span><i class="idd1">{{$inma->punishment}}</i></span>
            </div>
           
            
       
              
        </div>
    </div>
</div>









@endsection