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
 
<div class="panel panel-default">
    <div class="panel-body">
                            <div class="col-md-2">

                                @include('finance.layout.nav')
                            </div>
                            <div class="col-md-10">
                                <div class="card-box row">
                                    <div class="col-md-12">
                                                    &nbsp;
                                        <h4 class="header-title m-t-0 m-b-30 text-warning">Finance Setup</h4>
                                        <div class="">
                                            <ul class="nav nav-tabs tabs-bordered">
                                                <!--
                                                    <li class="active">
                                                    <a href="#payment" data-toggle="tab" aria-expanded="false">Payment Mode</a>
                                                </li>
                                                <li class="">
                                                    <a href="#customer" data-toggle="tab" aria-expanded="true">Customer Category</a>
                                                </li>
                                                -->
                                                <li class="active">
                                                    <a href="#ledgers" data-toggle="tab" aria-expanded="false">Ledgers</a>
                                                </li>
                                                <li class="">
                                                    <a href="#year_setup" data-toggle="tab" aria-expanded="false">Financial Year Setup</a>
                                                </li>
                                                <li class="">
                                                    <a href="#currencies" data-toggle="tab" aria-expanded="false">Currencies</a>
                                                </li>
                                                <li class="">
                                                    <a href="#votehead" data-toggle="tab" aria-expanded="false">Votehead Setup</a>
                                                </li>
                                                <li class="">
                                                    <a href="#bank_setup" data-toggle="tab" aria-expanded="false">Bank Setup</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane" id="payment">
                                                    @include('finance.settings.mode')
                                                </div>
                                                <div class="tab-pane " id="customer">
                                                    @include('finance.settings.c_category')
                                                </div>
                                                <div class="tab-pane active" id="ledgers">
                                                    @include('finance.settings.ledgers')
                                                </div>
                                                <div class="tab-pane" id="year_setup">
                                                    @include('finance.settings.years')
                                                </div>
                                                <div class="tab-pane" id="currencies">
                                                    @include('finance.settings.currencies')
                                                </div>
                                                <div class="tab-pane" id="votehead">
                                                    @include('finance.settings.votehead')
                                                </div>
                                                <div class="tab-pane" id="bank_setup">
                                                    @include('finance.settings.bank_setup')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            </div>
    </div>
</div>
        
@stop