@extends('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="active">
            <a href="{{ url('/dashboard') }}"> Dashboard</a>/
            <a href="{{ url('/finance') }}"> Finance</a>
        </li>
    </ol>
@stop
@section('page_title') Finance @stop
@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-2">

                @include('Student_Academics.Layouts.ExamsLayouts.nav')
            </div>
            <div class="col-md-10">
                <div class="card-box row">
                    <div class="col-md-12">
                        &nbsp;
                        <h4 class="header-title m-t-0 m-b-30 text-warning">Student's Exam Details</h4>
                        <div class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5> {{$student->first_name}} {{$student->middle_names}}</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $batch->Batch_code }}-{{ $student->admission_number }}/{{ $batch->Batch_year }}</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5> {{ $course->course_name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop