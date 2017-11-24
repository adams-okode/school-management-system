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
    <div class="col-md-2">
        @include('Students.Layouts.AppNav')
    </div>
    
    <div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-4">

                @include('Students.Settings.EducationLayout.Primary')

            </div>
            <div class="col-md-4">

                @include('Students.Settings.EducationLayout.HighSchool')
            </div>
            <div class="col-md-4">

                @include('Students.Settings.EducationLayout.Tertiary')
            </div>
        </div>

    </div>
    </div>


@stop