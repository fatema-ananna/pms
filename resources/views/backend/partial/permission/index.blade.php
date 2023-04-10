@extends('backend.master')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>

      <th scope="col">Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($permission as $key=>$data)
    <tr>
      <th scope="row">{{$permission->firstItem()+$key}}</th>
      <td>{{$data->name}}</td>
      <td></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$permission->links()}}
@endsection