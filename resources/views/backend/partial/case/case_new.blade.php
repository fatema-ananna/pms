@extends('backend.master')
@section('content')

<link href="{{url('/backend/css/new_inmate.css')}}" rel="stylesheet">

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="{{url('/backend/uploads',$cases->inmate->image)}}" alt="">
                    </a>
                    <h1>{{$cases->first_name}} {{$cases->last_name}} </h1>

                </div>
            </div>
        </div>
        <div class="profile-info col-md-9">

            <div class="panel">
                <div class="bio-graph-heading">
                    <h1>Case Details</h1>
                </div>
                <div class="panel-body bio-graph-info">
                    <h1>Case Details</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>First Name </span>: {{$cases->first_name}}</p>

                        </div>
                        <div class="bio-row">
                            <p><span>Last Name </span>: {{$cases->last_name}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Court </span>:{{$cases->court}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>crime</span>: {{$cases->crime->name}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>description </span>:{{$cases->description}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Case Start </span>:{{$cases->case_start}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Date of Crime </span>:{{$cases->date}}</< /p>
                        </div>
                        <div class="bio-row">
                            <p><span>Police Station </span>: {{$cases->station->name}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>punishment </span>:{{$cases->punishment->name}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Punishment Type</span>:
                                {{$cases->type}}
                            </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Punishment Duration </span> <span>:{{$cases->duration}} Year</span></p>
                        </div>
                        <div class="bio-row">
                            <p><span>Punishment Start From </span>: {{$cases->punishment_start}}</p>
                        </div>
                        <div class="bio-row">
                            
                            <p><span>Punishment End </span>: {{now()->parse($cases->punishment_start)->addMonth($cases->duration * 10)->toDateString()}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>activity </span>:{{$cases->activity->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body">


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body">


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body">


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection