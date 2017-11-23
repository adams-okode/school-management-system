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
    <div class="card-box" >
        @include('Students.Layouts.nav')
        <h3 class="center" >Student Personal Details</h3>
       
            <div class="center">
                <form role="form"   method="POST" action="{{ url('/students/apply/students') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                    <br>
                        {{ csrf_field() }}
                       <div class="col-md-6">
                            <div class="form-group">
                            <label  for="form-username">First Name<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" placeholder="First Name..." class="form-username form-control"  required parsley-type="text">
                            </div>
                       </div>

                        <div class="col-md-6">

                        <div class="form-group">
                            <label  for="form-username">Middle Names<span class="text-danger">*</span></label>
                            <input type="text" name="middle_names" placeholder="Middles Name..." class="form-username form-control"  required parsley-type="text">
                        </div>
                        </div>

                         <div class="col-md-6">

                        <div class="form-group">
                            <label  for="form-username">National ID<span class="text-danger">*</span></label>
                            <input type="text" name="National id" placeholder="National ID..." class="form-username form-control"  required parsley-type="text">
                        </div>
                        </div>

                        <div class="col-md-6">

                        <div class="form-group">
                            <label for="sell">Gender <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sel1" name="Gender" data-live-search="true">
                                <option value="1">Male</option>
                                <option value="0">Female</option>

                            </select>
                        </div>
                        </div>

                        <div class="col-md-6">

                        <input type="hidden" name="q" value="0">

                        <div class="form-group">
                            <label for="sell">Course <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sell" name="course_id" data-live-search="true">
                                @foreach($course as $courses)
                                    <option value="{{$courses->id}}">{{$courses->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                         <div class="col-md-6">

                        <div class="form-group">
                            <label for="sell">Batches <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sell" name="batch_id" data-live-search="true">
                                @foreach($batch as $batches)
                                    <option value="{{$batches->id}}">{{$batches->Batch_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer form-group">
                        <button type="submit" class="btn btn-info">Apply</button>
                    </div>
                </form>
            </div>
    </div>

@stop