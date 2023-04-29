@extends('backend.master')
@section('content')
<div class="container mt-5">
  <div class="form-group" class="container"><a class="btn btn-primary" href="{{route('inmate_list')}}">Add Inmate</a></div>
  <br>





  <table class="table inmate-table ">
    <thead class="bg-secondary text-white">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Inmate Id</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>

         <th scope="col">Cell No </th>
         <th scope="col">Word Name </th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($inma as $key=>$data)

      <tr>
        <th scope="row">{{$inma->firstItem()+$key}}</th>
        <td>{{$data->inmate_id}}</td>
        <td>{{$data->name}}</td>
        <td><img src="{{url('/backend/uploads/'.$data->image)}}" alt="image" height="80px" width="80px"></td>
       <td>{{$data->cell->id}}</td> 
       <td>{{$data->ward->name}}</td> 
      
      
       
     

       <td>
          <a href="{{route('inmate.view',$data->id)}}" class="btn btn-primary">View</a>
          <a href="{{route('inmate.delete',$data->id)}}" class="btn btn-danger">Delete</a>
          <a href="{{route('inmate.edit',$data->id)}}" class="btn btn-warning">Edit</a>
          <a href="{{route('case_list',$data->id)}}" class="btn btn-danger">Add Case</a>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$inma->links()}}



@endsection


 @section("")
<script type="text/javascript">
  $(function() {

    var table = $('.inmate-table').DataTable({
      processing: false,
      serverSide: true,
      ajax: "{{ route('inmate') }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'inmate_id',
          name: 'inmate_id',
          
          searchable: true
        },
        {
          data: 'first_name',
          name: 'first_name'
          
          ,searchable: true
        },
        {
          data: 'last_name',
          name: 'last_name',
          searchable: true
        },
        {
          data: 'image',
          name: 'image'
        },
        {
          data: 'nid',
          name: 'nid'
        },
        {
          data: 'cell_id',
          name: 'cell_id'
        },
        {
          data: 'gender',
          name: 'gender'
        },
        {
          data: 'action',
          name: 'action',
          orderable: true,
          searchable: true
        },
      ]
    });

  });
</script>
@endsection