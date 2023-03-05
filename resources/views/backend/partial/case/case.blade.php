@extends('backend.master')
@section('content')

<div class="container mt-5">
    <div class="form-group" class="container"><a class="btn btn-success" href="{{route('case_list')}}">Add Case</a></div>
    <br>

    <table class="table">
        <thead class="bg-secondary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Inmate_Id</th>
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">Court_of_Comittal</th>
                <th scope="col">Crime_Type</th>
                <th scope="col">Case_Start_Date</th>
                <!-- <th scope="col">Date_of_Crime</th> -->

                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pcase as $key=>$data)
            <tr>
                <th scope="row">{{$pcase->firstItem()+$key}}</th>
                <td>{{$data->inmate_case->id}}</td>
                <td>{{$data->first_name}}</td>
                <td>{{$data->last_name}}</td>

                <td>{{$data->crime_type}}</td>
                <td>{{$data->case_start}}</td>
                <!-- <td>{{$data->date}}</td> -->
               <td>
                    <a href="" class="btn btn-primary">View</a>
                    <a href="" class="btn btn-danger">Delete</a>
                    <a href="" class="btn btn-primary">Edit</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
{{$pcase->links()}}

@endsection