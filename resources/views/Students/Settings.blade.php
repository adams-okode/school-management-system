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
                    <form role="form"   method="POST" action="{{ url('/students/settings/batch') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="Batch_category" value="ONGOING">
                        <input type="hidden" name="id" value="INITIAL">

                        <button type="submit" class="btn btn-info">Convert Classes to Ongoing</button>

                    </form>
                </div>
            </div>
        </div>

    </div>


@stop