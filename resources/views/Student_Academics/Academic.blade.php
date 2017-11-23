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
            <div class="card-box" style="margin-left: 200px; margin-right: 200px; margin-top: 20px">
                <h3 class="center" >Create Exam Category</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('/studentacademics/students/creation') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="form-username">Academic Year<span class="text-danger">*</span></label>
                                <input type="text" name="Name" placeholder="Academic Year..." class="form-username form-control"  required parsley-type="text">
                            </div>
                            <div class="form-group">
                                <label  for="form-username">Start Date<span class="text-danger">*</span></label>
                                <input type="date" name="Start_date" placeholder="Start Date..." class="form-username form-control"  required parsley-type="text">
                            </div>
                            <div class="form-group">
                                <label  for="form-username">End Date<span class="text-danger">*</span></label>
                                <input type="date" name="End_date" placeholder="End Date..." class="form-username form-control"  required parsley-type="text">
                            </div>
                        </div>
                        <input type="hidden" name="q" value="2">
                        <input type="hidden" name="Status" value="1">
                        <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop