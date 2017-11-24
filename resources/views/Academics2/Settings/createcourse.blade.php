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

    <div class="row">
        <div class="col-md-2">
            @include('Academics2.Layouts.navacademics')
        </div>
        <div class="col-md-10">
            <div class="card-box" style="margin-left: 200px; margin-right: 200px">
                <h3 class="center" >Create Course</h3>
                <div class="center">
                    <form role="form"   method="POST" action="{{ url('academics/create/course') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label  for="form-username">Course Name<span class="text-danger">*</span></label>
                                <input type="text" name="course_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label  for="form-username">Course Code<span class="text-danger">*</span></label>
                                <input type="text" name="course_code" placeholder="Course Code..." class="form-username form-control"  required parsley-type="text">
                            </div>

                            <div class="form-group">
                                <label for="sell">Units for the Course <span class="text-danger">*</span></label>
                                <select class="selectpicker" multiple data-max-options="10" name="Units[]" data-live-search="true">
                                    @foreach($unit as $units)
                                        <option value="{{$units->id}}">{{$units->unit_code}} {{$units->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sell">Department Found In <span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="sell" name="department_id" data-live-search="true">
                                    @foreach($depart as $departs)
                                        <option value="{{$departs->id}}">{{$departs->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer form-group">
                            <button type="submit" class="btn btn-info">Create Course</button>
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