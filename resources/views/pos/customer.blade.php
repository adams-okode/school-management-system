@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/pos') }}"> Point Of Sale</a>/
        <a href="{{ url('/pos/customers') }}">Customers</a>
    </li>
</ol>
@stop
@section('page_title') POS @stop
@section('content')
<div class="card-box">
    @include('pos.layout.nav')
    <div class="row">
        <br>
        <button class="btn btn-custom" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i>New Customer</button>
        <br>
    </div>
    <legend></legend>
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
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->CustomerName }}</td>
                    <td>{{ $customer->PINNo }}</td>
                    <td>{{ $customer->CellPhoneNo }}</td>
                    <td>
                        <a href="{{ url('pos/delete_customer') }}?id={{ $customer->id }}" class="btn btn-danger" onclick="return confirm('Do you want to delete this customer?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a data-toggle="modal" data-target="#modal_customer_{{ $customer->id }}" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>
            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>
</div>  

<!-- Add User Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Customer</h4>
      </div>
      <div class="modal-body">
     <form role="form"   method="POST" action="{{ url('pos/create_customer') }}">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Full Name <span class="text-danger">*</span></label>
        <input type="text" name="CustomerName" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
        <label  for="form-username">PIN No<span class="text-danger">*</span></label>
        <input type="text" name="PINNo" placeholder="Pin No" class="form-username form-control"  required parsley-type="text">
    </div>
    
    <div class="form-group">
        <label  for="form-password">Phone <span class="text-danger">*</span></label>
        <input type="number" name="CellPhoneNo" placeholder="Phone Number..." class="form-password form-control"  required parsley-type="password">
    </div>
     <div class="form-group">
    <button type="submit" class="btn btn-info">Create Customer</button>
</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Add User Modal --> 



@forelse($customers as $customer)
        <!-- Add User Modal -->
        <div class="modal fade" id="modal_customer_{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Customer</h4>
            </div>
            <div class="modal-body">
            <form role="form"   method="POST" action="{{ url('pos/update_customer') }}?id={{ $customer->id }}">
                {{ csrf_field() }}
            <div class="form-group">
                <label  for="form-username">Full Name <span class="text-danger">*</span></label>
                <input type="text" name="CustomerName" value="{{ $customer->CustomerName }}" class="form-username form-control"  required parsley-type="text">
            </div>
            <div class="form-group">
                <label  for="form-username">PIN No<span class="text-danger">*</span></label>
                <input type="text" name="PINNo" value="{{ $customer->PINNo }}" class="form-username form-control"  required parsley-type="text">
            </div>
            
            <div class="form-group">
                <label  for="form-password">Phone <span class="text-danger">*</span></label>
                <input type="number" name="CellPhoneNo" value="{{ $customer->CellPhoneNo }}" class="form-password form-control"  required parsley-type="password">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-info">Create Customer</button>
        </div>
        </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <!-- End Add User Modal -->  
@empty
@endforelse


@stop