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
    

    
    <div class="">
        <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>

            <tr>
                <th>Name</th>
                <th>Pin</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->CustomerName }}</td>
                    <td>{{ $customer->PINNo }}</td>
                    <td>{{ $customer->CellPhoneNo }}</td>
                    <td>
                        <a href="{{ url('finance/bill')}}?id={{ $customer->id }}" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i>Bill</a>
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
</div>  

@stop