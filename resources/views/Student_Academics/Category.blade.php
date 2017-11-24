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

            @include('Student_Academics.Layouts.ExamsLayouts.Sidebarnav')
        </div>
        <div class="col-md-10">
            <div class="card-box" style="margin-left: 200px; margin-right: 200px; margin-top: 100px">
                <h3 class="center" >Create Exam Category</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('studentacademics/students/creation') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="form-username">Exam Category<span class="text-danger">*</span></label>
                                <input type="text" name="Name" placeholder="Exam Category..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Exam Percentage<span class="text-danger">*</span></label>
                                <input type="text" name="Percentage" placeholder="Exam Percentage..." class="form-username form-control"  required parsley-type="text">
                            </div>

                        </div>
                        <input type="hidden" name="q" value="1">
                        <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop