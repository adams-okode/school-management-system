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
                            <h4 class="header-title m-t-0 m-b-30 text-warning">Finance Setup</h4>
                            <div class="">
                                <ul class="nav nav-tabs tabs-bordered">
                                    <!--<li class="active">
                                        <a href="#payment" data-toggle="tab" aria-expanded="false">Payment Mode</a>
                                    </li>
                                    <li class="">
                                        <a href="#customer" data-toggle="tab" aria-expanded="true">Customer Category</a>
                                    </li>-->
                                    <li class="active">
                                        <a href="#ledgers" data-toggle="tab" aria-expanded="false">Profit and Loss Statement</a>
                                    </li>
                                    <li class="">
                                        <a href="#year_setup" data-toggle="tab" aria-expanded="false">Statement Of Accounts</a>
                                    </li>
                                    <li class="">
                                        <a href="#currencies" data-toggle="tab" aria-expanded="false">General Ledger</a>
                                    </li>
                                    
                                </ul>

                                <div class="tab-content">
                                   <div class="tab-pane active" id="ledgers">
                                        @include('finance.statements.tpl')
                                    </div>
                                    <div class="tab-pane" id="year_setup">
                                        @include('finance.statements.st_of_accounts')
                                    </div>
                                    <div class="tab-pane" id="currencies">
                                        @include('finance.statements.general_ledger')
                                    </div>
                                </div>
                            </div>
                        </div>
             </div>                      

@stop