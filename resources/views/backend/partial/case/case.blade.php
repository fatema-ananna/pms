@extends('backend.master')
@section('content')

<div class="container mt-5">
  
    <br>

    <table class="table">
        <thead class="bg-secondary">
            <tr>
                <th scope="col">No</th>
                <!-- <th scope="col">Inmate_Id</th> -->
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">Court_of_Comittal</th>
                <th scope="col">Crime_Type</th>
                <th scope="col">Case_Start_Date</th>
           
                <th scope="col">Date_of_Crime</th> 
                <th scope="col">police_station</th>
                <th scope="col">Punishment</th>
                <th scope="col">Punishment_Type</th>
                <th scope="col">Activity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($pcase as $key=>$data)
            
            <tr>
                <th scope="row">{{$pcase->firstItem()+$key}}</th>
                <td>{{$data->first_name}}</td>
                <td>{{$data->last_name}}</td>
              
                <td>{{$data->court}}</td>
                <td>{{$data->crime->name}}</td>
                <td>{{$data->case_start}}</td>
            
                
                <td>{{$data->date}}</td> 
                <td>{{$data->station->name}}</td>
                <td>{{$data->punishment->name}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->activity->name}}</td>
               <td>
                    <a href="{{route('case_view',$data->id)}}" class="btn btn-primary">View</a>
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