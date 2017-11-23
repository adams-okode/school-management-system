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

     <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Roles</b></h4>
                            <p class="text-muted font-14 m-b-20">
                                Manage User roles here.
                                <div class="pull-right"><a href="{{ url('/permissions') }}" class="btn btn-info">Permissions</a></div>
                            </p>
                   <a href="{{ url('/addrole') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Add Role</a>
                           <h6></h6>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
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
                                            <a href="{{ url('/deleteRole/'.$role->id) }}" class="btn btn-danger" onclick="return confirm('Do you want to delete this role?')"><i class="fa fa-fw fa-trash"></i></a>
                                            <a href="{{ url('/editRole/'.$role->id) }}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
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