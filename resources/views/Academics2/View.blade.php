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
        @include('Academics2.Layouts.navacademics')
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4">

                    @include('Academics2.ViewLayout.ClassType')

                </div>
                <div class="col-md-4">

                    @include('Academics2.ViewLayout.ClassStatus')
                </div>
                <div class="col-md-4">

                    <div class="row" align="left">
                        <a href="{{url('academics/batch') }}" class="btn btn-custom"><i class="fa fa-fw fa-plus"></i>Classes</a>
                        <br>
                    </div>

                </div>
            </div>

        </div>
    </div>


@stop