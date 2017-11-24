<!-- Add User Modal -->
<div class="modal fade" id="myUnits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Unit</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('academics/create/units') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Unit Name<span class="text-danger">*</span></label>
                        <input type="text" name="unit_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Unit Code<span class="text-danger">*</span></label>
                        <input type="text" name="unit_code" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label for="sell">Department Found In <span class="text-danger">*</span></label>
                        <select class="form-control selectpicker" id="sell" name="department_id" data-live-search="true">
                            @foreach($depart as $departs)
                                <option value="{{$departs->id}}">{{$departs->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Create Unit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myUnits"><i class="fa fa-fw fa-plus"></i>New Unit</button>
    <br>
</div>


<div class="row">
    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
        <thead>

        <tr>
            <th>Unit Name</th>
            <th>Unit Code</th>
            <th>Department Found In</th>
            <th>School Found In</th>
            <th>College Found In</th>
            <th>Campus Situated At</th>
            <th>Action</th>
        </tr>

        </thead>


        <tbody>
        @forelse($unit as $units)
            <tr>
                <td>{{ $units->unit_name }}</td>
                <td>{{ $units->unit_code }}</td>

                @foreach($depart as $departs)
                    @if($departs->id == $units->department_id)
                        <td>{{ $departs->department_name }}</td>
                    @endif
                @endforeach

                @foreach($school as $schools)
                    @foreach($depart as $departs)
                        @if($schools->id == $departs->school_id)
                            @if($departs->id == $units->department_id)
                                <td>{{ $schools->school_name }}</td>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                @foreach($college as $colleges)
                    @foreach($school as $schools)
                        @foreach($depart as $departs)
                            @if($colleges->id == $schools->college_id)
                                @if($schools->id == $departs->school_id)
                                    @if($departs->id == $units->department_id)
                                        <td>{{ $colleges->name }}</td>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @endforeach

                @foreach($campus as $campuses)
                    @foreach($college as $colleges)
                        @foreach($school as $schools)
                            @foreach($depart as $departs)
                                @if($campuses->id == $colleges->campus_id)
                                    @if($colleges->id == $schools->college_id)
                                        @if($schools->id == $departs->school_id)
                                            @if($departs->id == $units->department_id)
                                                <td>{{ $campuses->name }}</td>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
                <td>
                    <a href="{{url('academics/delete/units')}}/{{$units->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete {{$units->unit_name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    <a data-toggle="modal" data-target="#myUnitsUpdate{{$units->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                </td>
            </tr>


            <!-- Add User Modal -->
            <div class="modal fade" id="myUnitsUpdate{{$units->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update Unit Details</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form"   method="POST" action="{{ url('academics/update/units') }}">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label  for="form-username">Unit Name<span class="text-danger">*</span></label>
                                        <input type="text" name="unit_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                                    </div>

                                    <div class="form-group">
                                        <label  for="form-username">Unit Code<span class="text-danger">*</span></label>
                                        <input type="text" name="unit_code" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                                    </div>

                                    <input type="hidden" name="id" value="{{$units->id}}">

                                    <div class="form-group">
                                        <label for="leo">Department Found In <span class="text-danger">*</span></label>
                                        <select class="form-control selectpicker1" id="leo" name="department_id" data-live-search="true">
                                            @foreach($depart as $departs)
                                                <option value="{{$departs->id}}">{{$departs->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer form-group">
                                    <button type="submit" class="btn btn-info">Update Unit</button>
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
