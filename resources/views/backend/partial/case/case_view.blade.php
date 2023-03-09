@extends('backend.master')
@section('content')
<link rel="stylesheet" href="{{url('/backend/css/inmate.css')}}">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-right">Case_View</h1>
                </div>

                <div class="container mt-5">

                    <table class="table">
                        <thead class="bg-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <!-- <th scope="col">Inmate_Id</th> -->
                                <th scope="col">First_Name</th>
                                <th scope="col">Last_Name</th>
                                <th scope="col">Court_of_Comittal</th>
                                <th scope="col">Crime_Type</th>
                                <th scope="col">Description</th>
                                <th scope="col">Case_Start_Date</th>

                                <th scope="col">Date_of_Crime</th>
                                <th scope="col">police_station</th>


                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <th scope="row">{{$key=1}}</th>
                                <td>{{$cases->first_name}}</td>
                                <td>{{$cases->last_name}}</td>

                                <td>{{$cases->court}}</td>
                                <td>{{$cases->crime->name}}</td>
                                <td>{{$cases->description}}</td>
                                <td>{{$cases->case_start}}</td>
                                   <td>{{$cases->date}}</td>
                                <td>{{$cases->station->name}}</td>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection