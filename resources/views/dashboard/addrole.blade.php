@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/role') }}"> Roles</a>
    </li>
</ol>
@stop
@section('page_title') Create Role @stop
@section('content')
            <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                 <a href="{{ url('/role') }}" class="pull-left  btn btn-warning" style="margin-top:-10px;"><i class="fa fa-fw fa-arrow-left"></i>Go Back</a>
                                 <h3 class="panel-title text-center">Create Role</h3>
                            </div>
                            <div class="panel-body">
                                 <form role="form"  id="demo-form" method="POST" action="{{ url('/addrole') }}">
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
 
        <div class="form-group text-left" style="overflow: scroll; max-height: 650px; width:100%;">
            <h3>Permissions</h3>
            <input type="checkbox" id="selectall">Check all
            <hr style="margin-top: -1px;">
            @foreach($permissions as $permission)
            <input type="checkbox"   name="permission[]" class="case" value="{{$permission->id}}" > {{$permission->display_name}} <br>
            @endforeach
        </div>
     <div class="form-group">
    <button type="submit" class="btn btn-success">Create Role</button>
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