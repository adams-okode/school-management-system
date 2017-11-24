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
 <div class="card-box">
    @include('pos.layout.nav')
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
            <thead>

            <tr>
                <th>Name</th>
                <th>Pin</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->SupplierName }}</td>
                    <td>{{ $supplier->PINNo }}</td>
                    <td>{{ $supplier->CellPhoneNo }}</td>
                    <td>
                        <a href="" class="btn btn-danger" onclick="return confirm('Do you want to delete this permission?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a href="" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>
            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>
</div>    


@stop