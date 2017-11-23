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
        <h3 class="center" >Student's Financial Details</h3>
        <div class="center">
            <form role="form"   method="POST" action="{{ url('/students/apply/students') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="sell">Financial Source <span class="text-danger">*</span></label>
                        <select class="form-control selectpicker" id="sel1" name="Finances" data-live-search="true">
                            <option value="PRIVATE">Private</option>
                            <option value="OTHER">Other</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Source Description<span class="text-danger">*</span></label>
                        <textarea rows="4" cols="50" name="FinancesDescription" placeholder="Description..." class="form-username form-control"  required parsley-type="text">
                        </textarea>
                    </div>
                    <input type="hidden" name="q" value="8">
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