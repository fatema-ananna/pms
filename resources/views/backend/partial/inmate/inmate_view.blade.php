@extends('backend.master')
@section('content')
<link rel="stylesheet" href="{{url('/backend/css/inmate.css')}}">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-square mt-5" width="200px" src="{{url('/backend/uploads',$inma->image)}}"></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-right">Inmate Profile</h1>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels"><b>First_Name</b></label><input type="text" class="form-control" placeholder="name" value="{{$inma->first_name}}"></div>

                    <div class="col-md-6"><label class="labels"><b>Last_Name</b></label><input type="text" class="form-control" value="{{$inma->last_name}}" placeholder="last_name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels"><b>Nid </b></label><input type="text" class="form-control" placeholder="enter nid number" value="{{$inma->nid}}"></div>

                    <div class="col-md-12"><label class="labels"><b>Address</b> </label><input type="text" class="form-control" placeholder="enter address " value="{{$inma->address}}"></div>

                    <div class="col-md-12"><label class="labels"><b>Religon</b></label><input type="text" class="form-control" value="{{$inma->religon}}"></div>


                    <div class="col-md-12"><label class="labels"><b>Country</b></label><input type="text" class="form-control" value="{{$inma->country}}"></div>

                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels"><b>Country</b></label><input type="text" class="form-control" placeholder="country" value="{{$inma->country}}"></div>
             <br>
                    <h4>Emergency Contact Details</h4>
                    <div class="col-md-12"><label class="labels"><b>Relatives_Name</b></label><input type="text" class="form-control" value="{{$inma->relatives_name}}"></div>

                    <div class="col-md-12"><label class="labels"><b>Relatives_Number</b></label><input type="text" class="form-control" placeholder="enter address line 2" value="{{$inma->relatives_number}}"></div>

                    <div class="col-md-12"><label class="labels"><b>Relation</b></label><input type="text" class="form-control" placeholder="enter email id" value="{{$inma->relation}}"></div></n>



                <h1>View Case</h1>
                <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button"></button></div> -->
                <div class="container mt-5">

                    <table class="table">
                        <thead class="bg-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <!-- <th scope="col">Inmate_Id</th> -->

                                <th scope="col">Court_of_Comittal</th>
                                <th scope="col">Crime_Type</th>
                                <th scope="col">Description</th>

                                <th scope="col">police_station</th>
                                <th scope="col">punishment</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cases as $data)
                            <tr>
                                <th scope="row">{{$key=1}}</th>


                                <td>{{$data->court}}</td>
                                <td>{{$data->crime->name}}</td>
                                <td>{{$data->description}}</td>
                                
                                <td>{{$data->station->name}}</td>
                                <td>{{$data->punishment->name}}</td>
                                <td>
                                    <a href="{{route('case_view',$data->id)}}" class="btn btn-primary">Details</a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
</div>
</div>

</div>
</div>
</div>
</div>
@endsection