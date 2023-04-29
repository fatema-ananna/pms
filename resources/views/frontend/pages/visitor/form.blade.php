@extends('frontend.master')
@section('content')

    <div class="container mx-auto mt-5 py-5 ">

        <div class="container">

            <h1>Visitor Appointment Form</h1>
            <form action="{{ route('visitor_list_store') }}" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    @foreach ($errors->all() as $message)
                        <p class="alert alert-danger">{{ $message }}</p>
                    @endforeach
                @endif

                @csrf


                <div class="form-row">
                    <div class="col-md-6 wrap-input100 validate-input m-b-10">
                        <label><b>First_Name</b> </label>
                        <input type="text" required name="first_name" class="form-control" name="first_name"
                            value="{{ auth('frontendAuth')->user()->first_name }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 wrap-input100 validate-input m-b-10">
                        <label> <b>Last_Name</b></label>
                        <input type="text" class="form-control" name="last_name"
                            value="{{ auth('frontendAuth')->user()->last_name }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 wrap-input100 validate-input m-b-10">
                        <label> <b>Inmate_Id</b></label>
                        <input type="number" class="form-control" name="inmate_id" readonly
                            value="{{ auth('frontendAuth')->user()->inmate_id }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="image"><b>Image</b></label>
                        <input type="file" required image="image" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><b>Date of Birth</b></label>
                        <input type="date" class="form-control" name="dob"
                            value="{{ auth('frontendAuth')->user()->dob }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><b>Address</b></label>
                        <input type="text" class="form-control" name="address"
                            value="{{ auth('frontendAuth')->user()->address }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><b>Appointment Date</b></label>
                        <input type="date" class="form-control" name="appoint_date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><b>Nid</b></label>
                        <input type="tel" required nid="nid" class="form-control" name="nid"
                            value="{{ auth('frontendAuth')->user()->nid }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><b>Country</b></label>
                        <input type="text" class="form-control" name="country"
                            value="{{ auth('frontendAuth')->user()->country }}">
                    </div>
                </div>
                <div class="form-row" name="religon" value="{{ auth('frontendAuth')->user()->religon }}">
                    <div class="form-group col-md-6">
                        <label><b>Religon</b></label>
                        <select name="religon" id="" class="form-control">
                            <option value="islam">Islam</option>
                            <option value="hindu">Hindu</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" name="gender" value="{{ auth('frontendAuth')->user()->gender }}">
                    <div class="form-group col-md-6">
                        <label><b>Gender</b></label>
                        <select name="gender" id="" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><b>Phone</b></label>
                        <input type="number" class="form-control" name="number"
                            value="{{ auth('frontendAuth')->user()->number }}">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label><b>Relatives With Inmate</b></label>
                        <input type="text" class="form-control" name="relation"
                            value="{{ auth('frontendAuth')->user()->relation }}">
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-4">

                        <input type="submit" name="submit" class="mt-3 btn btn-info" value="submit">

                    </div>
                </div>
            </form>

        </div>

    @endsection
