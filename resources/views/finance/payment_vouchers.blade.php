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
                          <a href="{{ url('finance/receivables/pay')}}?id={{ $bill->id }}" class="btn btn-custom">Pay</a>  
                        @else
                          <a href="{{ url('finance/receivables/pay')}}?id={{ $bill->id }}" class="btn btn-custom">View</a>
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

@stopbj

hjhuhhuhuhujj
jjmmmmmmjiikjjjk
jijiiiiiiuu;jkkkk