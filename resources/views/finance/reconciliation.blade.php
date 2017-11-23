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
                            
                            
    </div>
</div>                      

@stop