@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/role') }}"> Roles</a>
    </li>
</ol>
@stop
@section('page_title') Manage Roles @stop
@section('content')
<!-- Add Role Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Role</h4>
      </div>
      <div class="modal-body">
     <form role="form"  id="demo-form" method="POST" action="{{ url('/role') }}">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Role Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Role Name..." class=" form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
        <label  for="form-username">Display Name</label>
        <input type="text" name="display_name" placeholder="Display Name..." class=" form-control">
    </div>
     <div class="form-group">
        <label  for="form-username">Role Description</label>
        <textarea name="description"  class=" form-control" >
        </textarea>
    </div>
 
     <div class="form-group">
    <button type="submit" class="btn btn-success">Create Role</button>
</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Add Role Modal -->
     <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Roles</b></h4>
                            <p class="text-muted font-14 m-b-20">
                                Manage User roles here.
                                <div class="pull-right"><a href="{{ url('/permissions') }}" class="btn btn-custom">Permissions</a></div>
                            </p>
                           <button class="btn btn-custom" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i>Add Role</button>
                           <h6></h6>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @forelse($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            <a href="" class="btn btn-danger" onclick="return confirm('Do you want to delete this role?')"><i class="fa fa-fw fa-trash"></i></a>
                                            <a href="" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Data Found</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@stop