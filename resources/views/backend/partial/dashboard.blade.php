@extends('backend.master')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{__('Welcome')}} Admin</h1>

    <div class="row">
        <div class="col-xl-2 col-md-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Inmate </div>
                <div class="card-footer d-flex align-items-center     justify-content-between">
                {{$count["inmate"]}}
                    <a class="small text-white stretched-link" href="{{route('inmate')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body fs-5">
                     Total Crime
                     <div class="">
                     {{$count["inmate"]}}
                     </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Punishment Details
                    
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                {{$count["punishment"]}}
                    <a class="small text-white stretched-link" href="{{route('punishment')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Visitor Details</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                {{$count["visitor"]}}
                    <a class="small text-white stretched-link" href="{{route('visitor')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Case Details</div>
                   <div class="card-footer d-flex align-items-center     justify-content-between">
                   {{$count["case"]}}
                        <a class="small text-white stretched-link" href="{{route('case')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection