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

        <div class="col-md-9">
            <div class="card-box">
                <h3 class="center" >Employee Contact Details</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('HR/employee/create') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="form-username">Postal Address<span class="text-danger">*</span></label>
                                <input type="text" name="Postal_address" placeholder="Postal Address..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Email Address<span class="text-danger">*</span></label>
                                <input type="text" name="Email_address" placeholder="Email Address..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" name="Mobile_number" placeholder="Mobile Number..." class="form-username form-control"  required parsley-type="text">
                            </div>
                            <input type="hidden" name="q" value="2">
                            <input type="hidden" name="id" value="{{$employee->id}}">
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