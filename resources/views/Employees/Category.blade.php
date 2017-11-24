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
            <div class="card-box" style="margin-left: 200px; margin-right: 200px; margin-top: 100px">
                <h3 class="center" >Create Employee Category</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('HR/category/creation') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="form-username">Employee Category<span class="text-danger">*</span></label>
                                <input type="text" name="Name" placeholder="Employee Category..." class="form-username form-control"  required parsley-type="text">
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