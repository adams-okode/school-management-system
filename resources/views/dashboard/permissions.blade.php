@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/permissions') }}"> Permissions</a>
    </li>
</ol>
@stop
@section('page_title') Manage Permissions @stop
@section('content')
<!-- Add Role Modal -->
<div class="modal fade" id="permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Permission</h4>
      </div>
      <div class="modal-body">
     <form   id="demo-form" method="post" action="{{ route('storePermission') }}">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Permission Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Permission Name..." class=" form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
        <label  for="form-username">Display Name</label>
        <input type="text" name="display_name" placeholder="Display Name..." class=" form-control">
    </div>
     <div class="form-group">
        <label  for="form-username">Permission Description</label>
        <textarea name="description"  class=" form-control" >
        </textarea>
    </div>
 
     <div class="form-group">
    <input type="submit" class="btn btn-success" value="Create Permission">
</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Add Role Modal -->
     <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Permissions</b></h4>
    <p class="text-muted font-14 m-b-20">
        Manage User permissions here.
        <div class="pull-right"><a href="{{ url('/role') }}" class="btn btn-primary">Roles</a></div>
    </p>
   <button class="btn btn-info" data-toggle="modal" data-target="#permission"><i class="fa fa-fw fa-plus"></i>Create Permission</button>
   <h6></h6>
        <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>
            <tr>
                <th>Name</th>
                <th>Display Name</th>
            </tr>
                                    </thead>


                                    <tbody>
                                    @forelse($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
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