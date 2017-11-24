@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
        <a href="{{ url('/dashboard') }}"> Dashboard</a>
    </li>
</ol>
@stop
@section('page_title') Dashboard @stop
@section('content')
<!-- Add User Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New User</h4>
      </div>
      <div class="modal-body">
     <form role="form"   method="POST" action="{{ url('/dashboard') }}">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Full Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
    </div>
    <div class="form-group">
        <label  for="form-username">Preffered Username <span class="text-danger">*</span></label>
        <input type="text" name="username" placeholder="Username..." class="form-username form-control"  required parsley-type="text">
    </div>
     <div class="form-group">
        <label  for="form-username">Email Address <span class="text-danger">*</span></label>
        <input type="email" name="email" placeholder="Email Address..." class="form-username form-control"  required parsley-type="email">
    </div>
    <div class="form-group">
        <label  for="form-password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" placeholder="Password..." class="form-password form-control"  required parsley-type="password">
    </div>
     <div class="form-group">
    <button type="submit" class="btn btn-info">Create User</button>
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

<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-t-0 header-title"><b>Users</b></h4>
<p class="text-muted font-14 m-b-20">
    Manage Users here.

</p>
<div class="pull-right">
        <!--<a href="{{ url('/role') }}" class="btn btn-primary">Roles</a> | 
        <a href="{{ url('/permissions') }}" class="btn btn-info">Permissions</a>--></div>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i>Add User</button>
<h6></h6>
    <table id="datatable" class="table table-striped table-hover table-condensed table-bordered table-colored table-primary m-0 mails table-actions-bar">
        <thead>
        <tr>
            <th>FullName</th>
            <th>Email Address</th>
            <th>Preferred Username</th>
            <th>Roles</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
        </thead>


        <tbody>
                    @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>   @foreach($user->roles as $role)
                        {{$role->name}},
                    @endforeach</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('/deleteUser/'.$user->id) }}" class="table-action-btn" onclick="return confirm('Do you want to delete this user?')"><i class="fa fa-fw fa-trash"></i></a>
                                            <a href="{{ url('/editUser/'.$user->id) }}" class="table-action-btn"><i class=" fa fa-fw fa-pencil "></i></a>
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
@stop