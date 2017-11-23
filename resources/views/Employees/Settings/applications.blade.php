@extends('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="active">
            <a href="{{ url('/dashboard') }}"> Dashboard</a>/
            <a href="{{ url('/pos') }}"> Point Of Sale</a>/
            <a href="{{ url('/pos/suppliers') }}">Supplier</a>
        </li>
    </ol>
@stop
@section('page_title') POS @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box" >
                <h3 class="center" >Employee Personal Details</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('HR/employee/create') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <br>
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label  for="form-username">First Name<span class="text-danger">*</span></label>
                                    <input type="text" name="First_name" placeholder="First Name..." class="form-username form-control"  required parsley-type="text">
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label  for="form-username">Middle Names<span class="text-danger">*</span></label>
                                    <input type="text" name="Middle_names" placeholder="Middles Name..." class="form-username form-control"  required parsley-type="text">
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label  for="form-username">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" name="Last_name" placeholder="Last Name..." class="form-username form-control"  required parsley-type="text">
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label  for="form-username">Nationality<span class="text-danger">*</span></label>
                                    <input type="text" name="Nationality" placeholder="Nationality..." class="form-username form-control"  required parsley-type="text">
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="sell">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker" id="sel1" name="Gender" data-live-search="true">
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <input type="hidden" name="q" value="0">

                                <div class="form-group">
                                    <label for="sell">Department <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker" id="sell" name="Department_id" data-live-search="true">
                                        @foreach($depart as $departs)
                                            <option value="{{$departs->id}}">{{$departs->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop