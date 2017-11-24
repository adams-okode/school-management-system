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
    <div class="col-md-2">
        @include('Students.Layouts.AppNav')
    </div>
    
    <div class="col-md-9">
    <div class="card-box" style="margin-left: 300px; margin-right: 300px">
        <h3 class="center" >Student's Parent Contact Details</h3>
        <div class="center">
            <form role="form"   method="POST" action="{{ url('/students/apply/students') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Full Names<span class="text-danger">*</span></label>
                        <input type="text" name="Parent_names" placeholder="Full Names..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label for="sell">Relationship <span class="text-danger">*</span></label>
                        <select class="form-control selectpicker" id="sel1" name="Relationship" data-live-search="true">
                            <option value="PARENT">Parent</option>
                            <option value="CHILD">Child</option>
                            <option value="RELATIVE">Relative</option>
                            <option value="SPONSOR">Sponsor</option>
                            <option value="FRIEND">Friend</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Address<span class="text-danger">*</span></label>
                        <input type="text" name="Address" placeholder="Address..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Phone Number<span class="text-danger">*</span></label>
                        <input type="text" name="Phone_number" placeholder="Phone Number..." class="form-username form-control"  required parsley-type="text">
                    </div>
                    <input type="hidden" name="q" value="6">
                    <input type="hidden" name="id" value="{{$application->id}}">
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>

@stop