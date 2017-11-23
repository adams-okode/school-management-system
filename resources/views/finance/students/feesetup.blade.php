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
    @include('finance.layout.nav')
</div>
<div class="col-md-10">
                        <div class="card-box">
                            
                             &nbsp;
                            <h4 class="header-title m-t-0 m-b-30 text-warning">Fee SetUp</h4>
                            <div class="">
                                <ul class="nav nav-tabs tabs-bordered">
                                   
                                    <li class="active">
                                        <a href="#ledgers" data-toggle="tab" aria-expanded="false">Course Fees</a>
                                    </li>
                                    <li class="">
                                        <a href="#year_setup" data-toggle="tab" aria-expanded="false">Batch Fees</a>
                                    </li>
                                    <li class="">
                                        <a href="#currencies" data-toggle="tab" aria-expanded="false">Fee Items</a>
                                    </li>
                                    <li class="">
                                        <a href="#bill" data-toggle="tab" aria-expanded="false">Bill Fee</a>
                                    </li>
                                    <li class="">
                                        <a href="#reports" data-toggle="tab" aria-expanded="false">Reports</a>
                                    </li>
                                    
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="ledgers">
                                        @include('finance.students.coursefee')
                                    </div>
                                    <div class="tab-pane" id="year_setup">
                                        @include('finance.students.batchfee')
                                    </div>
                                    <div class="tab-pane" id="currencies">
                                        @include('finance.students.feeitems')
                                    </div>
                                    <div class="tab-pane" id="bill">
                                        @include('finance.students.billfee')
                                    </div>
                                    <div class="tab-pane" id="reports">
                                        @include('finance.students.reports')
                                    </div>
                                </div>
                            </div>
                        </div>
             </div>                      

@stop