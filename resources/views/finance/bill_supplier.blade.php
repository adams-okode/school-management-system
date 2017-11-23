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
    <div class="row">
        <div class="col-md-4">
            <h5>Name: {{ $customer->SupplierName }}</h5>
        </div>
        <div class="col-md-4">
            <h5>Pin: {{ $customer->PINNo }} </h5>
        </div>
        <div class="col-md-4">
          <h5> Phone: {{ $customer->CellPhoneNo }} </h5> 
        </div>
    </div>
    <div class="row">
    <form action="{{ url('finance/generate_invoice/supplier') }}" method="POST">
        {{ csrf_field() }}
        <center><h4>Create Bill</h4></center>
        <div id="billing_field_place">
    
        </div>
        <div id="billing_field_place_total">
    
        </div>


        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        

        <input type="hidden" name="invoice_no" value="{{ date('YmdHis')}}">

        <center><button class="btn btn-custom" type="submit">Generate</button></center> 
    </form>   
    </div>
    <div class="">
        <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
            <thead>

            <tr>
                <th>Number</th>
                <th>Items</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($bills as $bill)
                <tr>
                    <td>{{ $bill->invoice_no }}</td>
                    <td>{{ $bill->items }}</td>
                    <td>{{ $bill->Amount }}</td>
                    <td>
                        @if($bill->status=='0')
                          <a href="{{ url('finance/payment/vouchers')}}?id={{ $bill->id }}" class="btn btn-custom">Pay</a>  
                        @else
                          <a href="{{ url('finance/payment/vouchers')}}?id={{ $bill->id }}" class="btn btn-custom">View</a>
                        @endif
                    </td>
                </tr>
            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>
</div>  
</div>
@stop

@section('scripts')
@include('finance.settings.scripts.bulk_items')
@stop