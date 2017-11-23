@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/role') }}"> Roles</a>
    </li>
</ol>
@stop
@section('page_title') Edit Role @stop
@section('content')
            <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <a href="{{ url('/role') }}" class="pull-left  btn btn-warning" style="margin-top:-10px;"><i class="fa fa-fw fa-arrow-left"></i>Go Back</a> <h3 class="panel-title text-center">Edit Role</h3>
                            </div>
                            <div class="panel-body">
                                 <form role="form"  id="demo-form" method="POST" action="{{ url('/editRole/'.$role->id) }}">
                                    {{method_field('PATCH')}}
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Role Name</label>
        <input type="text" name="name" placeholder="Role Name..." class=" form-control"  value="{{$role->name}}">
    </div>
    <div class="form-group">
        <label  for="form-username">Display Name</label>
        <input type="text" name="display_name"   value="{{$role->display_name}}" class=" form-control">
    </div>
     <div class="form-group">
        <label  for="form-username">Role Description</label>
    <input type="text" class="form-control" name="description" id="" placeholder="Description" value="{{$role->description}}">
    </div>
 
        <div class="form-group text-left" style="overflow: scroll; max-height: 650px; width:100%;">
            <h3>Permissions</h3>
            <input type="checkbox" id="selectall">Check all
            <hr style="margin-top: -1px;">
            @foreach($permissions as $permission)
           <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}  class="case" name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
            @endforeach
        </div>
     <div class="form-group">
    <button type="submit" class="btn btn-info">Update Role</button>
</div>
</form>
                            </div>
                        </div>
                    </div>
                </div>

@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $.selectall('#selectall', '.case');
});
</script>
@stop