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
    @include('Students.Layouts.nav')
    <div class="row">
    <div class="col-md-2">
        @include('Students.Layouts.AppNav')
    </div>
    
    <div class="col-md-9">
    <div class="card-box">
        <h3 class="center" >Student Personal Information</h3>
        <div class="center">
            <form role="form"   method="POST" action="{{ url('/students/apply/students') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">First Name<span class="text-danger">*</span></label>
                        <input type="text" name="first_name" placeholder="First Name..." class="form-username form-control"  required parsley-type="text" value="{{$application->first_name}}">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Middle Names<span class="text-danger">*</span></label>
                        <input type="text" name="middle_names" placeholder="Middles Name..." class="form-username form-control"  required parsley-type="text" value="{{$application->middle_names}}">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">National ID<span class="text-danger">*</span></label>
                        <input type="text" name="National_id" placeholder="National ID..." class="form-username form-control"  required parsley-type="text" value="{{$application->National_id}}">
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
                        <input type="date" name="dob" placeholder="Date of Birth..." class="form-username form-control"  required parsley-type="text" value="{{$application->dob}}">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Nationality<span class="text-danger">*</span></label>
                        <input type="text" name="Nationality" placeholder="Nationality..." class="form-username form-control"  required parsley-type="text" value="{{$application->nationality}}">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Gender<span class="text-danger">*</span></label>
                            @if($application->Gender === 'MALE')
                                <input type="text" name="Gender" placeholder="Male" class="form-username form-control"  required parsley-type="text" value="{{$application->Gender}}" disabled>
                            @else
                                <input type="text" name="Gender" placeholder="Female" class="form-username form-control"  required parsley-type="text" value="{{$application->Gender}}" disabled>
                            @endif
                    </div>

                    <input type="hidden" name="q" value="1">
                    <input type="hidden" name="id" value="{{$application->id}}">

                    <div class="form-group">
                        <label  for="form-username">Course<span class="text-danger">*</span></label>
                            @foreach($course as $courses)
                                @if($application->course_id == $courses->id)
                                    <input type="text" name="Gender" placeholder="{{$courses->course_name}}" class="form-username form-control"  required parsley-type="text" value="{{$courses->id}}" disabled>
                                @endif
                            @endforeach
                    </div>

                    <div class="form-group">
                        <label for="sell">Batches <span class="text-danger">*</span></label>
                        <select class="form-control selectpicker" id="sell" name="batch_id" data-live-search="true">
                            @foreach($batch as $batches)
                                <option value="{{$batches->id}}">{{$batches->Batch_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Apply</button>
                </div>
            </form>
        </div>
    </div>
    </div>
        
    </div>

@stop