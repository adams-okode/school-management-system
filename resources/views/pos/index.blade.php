@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/pos') }}"> Point Of Sale</a>
    </li>
</ol>
@stop
@section('page_title') Finance @stop
@section('content')
                    <div class="card-box">
                            @include('pos.layout.nav')
                             &nbsp;
                           
                    </div>
               

@stop