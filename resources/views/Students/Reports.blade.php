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
    @include('Students.Layouts.nav')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-3">
                <div class="row" align="left">
                    <a class="btn btn-custom" href="{{url('students/reports/students')}}"><i class="fa fa-fw fa-plus"></i>All Students</a>
                    <br>
                </div>
            </div>
            <div class="col-md-3">
                @include('Students.PDF.Layout.Batch')
            </div>
            <div class="col-md-3">
                @include('Students.PDF.Layout.Course')
            </div>
            <div class="col-md-3">
                @include('Students.PDF.Layout.department')
            </div>
        </div>

    </div>


@stop