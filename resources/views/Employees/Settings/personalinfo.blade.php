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
        <div class="col-md-2">
            @include('Employees.Layouts.AppNav')
        </div>

        <div class="col-md-10">
            <div class="card-box">
                <h3 class="center" >Employee Personal Information</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('HR/employee/create') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="form-username">First Name<span class="text-danger">*</span></label>
                                <input type="text" name="First_name" placeholder="First Name..." class="form-username form-control"  required parsley-type="text" value="{{$employee->First_name}}">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Middle Names<span class="text-danger">*</span></label>
                                <input type="text" name="Middle_names" placeholder="Middles Name..." class="form-username form-control"  required parsley-type="text" value="{{$employee->Middle_names}}">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="Last_name" placeholder="last Name..." class="form-username form-control"  required parsley-type="text" value="{{$employee->Last_name}}">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Nationality<span class="text-danger">*</span></label>
                                <input type="text" name="Nationality" placeholder="Nationality..." class="form-username form-control"  required parsley-type="text" value="{{$employee->Nationality}}">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">National ID<span class="text-danger">*</span></label>
                                <input type="text" name="National_id" placeholder="National ID..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label for="sell">Marital Status<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="sel1" name="Marital_Status" data-live-search="true">
                                    <option value="SINGLE">Single</option>
                                    <option value="MARRIED">Married</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Date of Birth<span class="text-danger">*</span></label>
                                <input type="date" name="Dob" placeholder="Date of Birth..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Gender<span class="text-danger">*</span></label>
                                @if($employee->Gender === 'MALE')
                                    <input type="text" name="Gender" placeholder="Male" class="form-username form-control"  required parsley-type="text" value="{{$employee->Gender}}" disabled>
                                @else
                                    <input type="text" name="Gender" placeholder="Female" class="form-username form-control"  required parsley-type="text" value="{{$employee->Gender}}" disabled>
                                @endif
                            </div>

                            <input type="hidden" name="q" value="1">
                            <input type="hidden" name="id" value="{{$employee->id}}">

                            <div class="form-group">
                                <label  for="form-username">Department<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="{{$depart->department_name}}" class="form-username form-control"  required parsley-type="text" value="{{$depart->department_name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="sell">Employee Category<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="sel1" name="Category" data-live-search="true">
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}">{{$categories->Name}}</option>
                                    @endforeach
                                </select>
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