@extends('backend.master')
@section('content')
    <div class="mt-5">
        <div class="form-group" class="container"></div>
        <br>

        <table class="table">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">First_Name</th>
                    <th scope="col">Last_Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Appointment Date</th>
                    <!-- <th scope="col">Nid</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Relation</th> -->


                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($vis as $key => $data)
                    <tr>
                        <th scope="row">{{ $vis->firstItem() + $key }}</th>
                        <td>{{ $data->first_name }}</td>
                        <td>{{ $data->last_name }}</td>
                        <td><img src="{{ url('/frontend/slider/' . $data->image) }}" alt="image" height="80px"
                                width="80px"></td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->number }}</td>
                        <td>{{ $data->appointment_date }}</td>
                        <td>
                            <form action="{{ route('visitor.status', $data->id) }}" method=post>
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <select name="status" id="" class="form-control">
                                        <option @if ($data->status == 'Pending') selected @endif value="Pending">Pending
                                        </option>
                                        <option @if ($data->status == 'Approved') selected @endif value="Approved">Approved
                                        </option>
                                        <option @if ($data->status == 'Rejected') selected @endif value="Rejected">Rejected
                                        </option>
                                    </select>
                                    <input type="date" name="appointment_date" id="appointment_date" class="form-control"
                                        value="{{ $data->appointment_date }}">
                                    <button class=" btn btn-primary" type="submit" style="margin-left:10px">submit</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $vis->links() }}
@endsection
