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
    <div class="col-md-2">
        @include('Employees.Layouts.AppNav')
    </div>

    <div class="col-md-9">
        <div class="card-box" style="margin-left: 200px; margin-right: 200px; margin-top: 40px">
            <h3 class="center" >Employee's Accommodation Details</h3>
            <div class="center">
                <form role="form"   method="POST" action="{{ url('HR/employee/create') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="sell">School Accommodation<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sel1" name="Accommodation" data-live-search="true">
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>

                            </select>
                        </div>
                        <input type="hidden" name="q" value="6">
                        <input type="hidden" name="id" value="{{$employee->id}}">
                    </div>
                    <div class="modal-footer form-group">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop





