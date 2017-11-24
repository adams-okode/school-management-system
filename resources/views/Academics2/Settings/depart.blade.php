<!-- Add User Modal -->
<div class="modal fade" id="myDepart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Department</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('academics/create/depart') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Department Name<span class="text-danger">*</span></label>
                        <input type="text" name="department_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Department Head <span class="text-danger"></span></label>
                        <select class="form-control selectpicker" id="sel1" name="name" data-live-search="true">
                            <option value="Leon Lishenga">Leon Lishenga</option>
                            <option value="Mr Kiambi">Mr Kiambi</option>
                            <option value="Mr Chege">Mr Chege</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sell">School Found In<span class="text-danger"></span></label>
                        <select class="form-control selectpicker" id="sell" name="school_id" data-live-search="true">
                            @foreach($school as $schools)
                                <option value="{{$schools->id}}">{{$schools->school_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Create Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myDepart"><i class="fa fa-fw fa-plus"></i>New Department</button>
    <br>
</div>


<div class="row">
    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
        <thead>

        <tr>
            <th>Department Name</th>
            <th>Department Head</th>
            <th>School Found In</th>
            <th>College Situated In</th>
            <th>Campus Situated At</th>
            <th>Action</th>
        </tr>

        </thead>


        <tbody>
        @forelse($depart as $departs)
            <tr>
                <td>{{ $departs->department_name }}</td>
                <td>{{ $departs->name }}</td>

                @foreach($school as $schools)
                    @if($schools->id == $departs->school_id)
                        <td>{{ $schools->school_name }}</td>
                    @endif
                @endforeach

                @foreach($school as $schools)
                    @foreach($college as $colleges)
                        @if($colleges->id == $schools->college_id)
                            @if($schools->id == $departs->school_id)
                                <td>{{ $colleges->name }}</td>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                @foreach($school as $schools)
                    @foreach($college as $colleges)
                        @foreach($campus as $campuses)
                            @if($campuses->id == $colleges->campus_id)
                                @if($colleges->id == $schools->college_id)
                                    @if($schools->id == $departs->school_id)
                                        <td>{{ $campuses->name }}</td>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @endforeach

                <td>
                    <a href="{{url('academics/delete/depart')}}/{{$departs->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete {{$departs->department_name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    <a data-toggle="modal" data-target="#myDepartUpdate{{$departs->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                </td>
            </tr>


            <!-- Add User Modal -->
            <div class="modal fade" id="myDepartUpdate{{$departs->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update Department Details</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form"   method="POST" action="{{ url('academics/update/depart') }}">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label  for="form-username">Department Name<span class="text-danger">*</span></label>
                                        <input type="text" name="department_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="sel1">Department Head <span class="text-danger"></span></label>
                                        <select class="form-control selectpicker" id="sel1" name="name" data-live-search="true">
                                            <option value="Leon Lishenga">Leon Lishenga</option>
                                            <option value="Mr Kiambi">Mr Kiambi</option>
                                            <option value="Mr Chege">Mr Chege</option>

                                        </select>
                                    </div>

                                    <input type="hidden" name="id" value="{{$departs->id}}">

                                    <div class="form-group">
                                        <label for="sell">School Found In<span class="text-danger"></span></label>
                                        <select class="form-control selectpicker" id="sell" name="school_id" data-live-search="true">
                                            @foreach($school as $schools)
                                                <option value="{{$schools->id}}">{{$schools->school_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer form-group">
                                    <button type="submit" class="btn btn-info">Update Department</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Add User Modal -->




        @empty
            <p>No Data Found</p>
        @endforelse
        </tbody>
    </table>
</div>
