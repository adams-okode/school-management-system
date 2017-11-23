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
@section('styles')
    <style>
        .multiselect {
            width: 200px;
        }

        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
            font-weight: bold;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #dadada solid;
        }

        #checkboxes label {
            display: block;
        }

        #checkboxes label:hover {
            background-color: #1e90ff;
        }
    </style>

@endsection
@section('content')
    <div class="col-md-2">
        @include('Employees.Layouts.AppNav')
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">

                    @include('Employees.Settings.EducationLayout.Primary')

                </div>
                <div class="col-md-6">

                    @include('Employees.Settings.EducationLayout.HighSchool')
                </div>
                <div class="col-md-6" style="margin-top: 40px">

                    @include('Employees.Settings.EducationLayout.Tertiary')
                </div>
                <div class="col-md-6">

                    <form role="form"   method="POST" action="{{ url('HR/employee/create') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="q" value="9">
                            <input type="hidden" name="id" value="{{$employee->id}}">
                            <div class="form-group">
                                <label for="sell">Units to Teach<span class="text-danger">*</span></label>
                                    <select class="selectpicker" multiple data-max-options="10" name="Units[]" data-live-search="true">
                                        @foreach($unit as $units)
                                            <option value="{{$units->id}}">{{$units->unit_code}} {{$units->unit_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


@stop

@section('scripts')
    <script>
        var expanded = false;

        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }
    </script>
@stop