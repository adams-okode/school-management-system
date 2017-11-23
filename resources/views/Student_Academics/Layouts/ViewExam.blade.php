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
                                    <h5> {{ $studentcourse->course_name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box" >
                            <h3 class="center" >Input Exam Marks</h3>
                            <div class="center">
                                <form role="form"   method="POST" action="{{ url('/studentacademics/students/creation') }}" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="form-group  col-md-9">
                                                <label for="sell">Course <span class="text-danger">*</span></label>

                                                @foreach($depart as $unit=>$value)
                                                    @foreach($unitdepart as $unitdeparts)
                                                        @if($unitdeparts->id==$value)
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    {{$unitdeparts->unit_name}}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="number" name="{{$unitdeparts->id}}" placeholder="Marks..." class="form-username form-control"  required parsley-type="text"><br>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div class="form-group  col-md-3">
                                            </div>
                                        </div>
                                        <input type="hidden" name="q" value="4">
                                        <input type="hidden" name="Student_id" value="{{$student->id}}">
                                        <input type="hidden" name="Academic_year" value="{{$academician->Name}}">
                                        <input type="hidden" name="Semester" value="{{$examiner->Semester}}">
                                        <input type="hidden" name="Exam_id" value="{{$examiner->id}}">
                                    </div>
                                    <div class="modal-footer form-group">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



@stop