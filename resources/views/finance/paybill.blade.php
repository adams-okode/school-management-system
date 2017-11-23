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

   

    <div class="row">
        <div class="col-md-4">
            <h5>Name: {{ $customer->CustomerName }}</h5>
        </div>
        <div class="col-md-4">
            <h5>Pin: {{ $customer->PINNo }} </h5>
        </div>
        <div class="col-md-4">
          <h5> Phone: {{ $customer->CellPhoneNo }} </h5> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h5>Invoice Number: {{ $bill->invoice_no }}</h5>
        </div>
        <div class="col-md-4">
            <h5>Total Payable: {{ $bill->Amount }} </h5>
        </div>
        <div class="col-md-4">
          <h5> Date Created: {{ $bill->created_at }} </h5> 
        </div>
    </div>
    <div class="row">
    <form action="{{ url('finance/generate_invoice') }}" method="POST">
    {{ csrf_field() }}
        <center><h4>Pay Bill</h4></center>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="sel1">Total Payed Amount:</label>
                <input type="number" class="form-control" name="Amount" value="">
            </div> 
        </div>

        <div class="row">
            <div class="form-group col-md-6">
               
                <br>
                <button class="btn btn-custom" type="submit">Pay</button>
            </div>    
        </div>

    </form>   
    </div>
  
</div>  
</div>
</div>  


@stop