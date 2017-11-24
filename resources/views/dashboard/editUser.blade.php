@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
    </li>
</ol>
@stop
@section('page_title') Edit User @stop
@section('content')
            <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <a href="{{ url('/dashboard') }}" class="pull-left  btn btn-warning" style="margin-top:-10px;"><i class="fa fa-fw fa-arrow-left"></i>Go Back</a> <h3 class="panel-title text-center">Edit User</h3>
                            </div>
                            <div class="panel-body">
       <form role="form"   method="POST" action="{{ url('/editUser/'.$user->id) }}">
          {{method_field('PATCH')}}
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Full Name </label>
        <input type="text" name="name" placeholder="Name..." class="form-username form-control" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label  for="form-username">Preffered Username </label>
        <input type="text" name="username" placeholder="Username..." class="form-username form-control" value="{{$user->username}}">
    </div>
     <div class="form-group">
        <label  for="form-username">Email Address </label>
        <input type="email" name="email" placeholder="Email Address..." class="form-username form-control" value="{{$user->email}}">
    </div>
 <div class="form-group text-left">
            <h3>Roles</h3>
            <input type="checkbox" id="selectall">Check all
            <hr style="margin-top: -1px;">
            @foreach($roles as $role)
           <input type="checkbox" {{in_array($role->id,$role_users)?"checked":""}}  class="case" name="roles[]" value="{{$role->id}}" > {{$role->name}} <br>
            @endforeach
        </div>
     <div class="form-group">
    <button type="submit" class="btn btn-primary">Update User</button>
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