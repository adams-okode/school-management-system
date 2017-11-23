<!-- Add User Modal -->
<div class="modal fade" id="myCollege" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New School</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('academics/create/school') }}">
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label  for="form-username">School Name<span class="text-danger">*</span></label>
                            <input type="text" name="school_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                        </div>
                    <div class="form-group">
                        <label for="sel1">School Head <span class="text-danger">*</span></label>
                        <select class="form-control selectpicker" id="sel1" name="name" data-live-search="true">
                            <option value="1">Leon Lishenga</option>
                            <option value="2">Mr Kiambi</option>
                            <option value="3">Mr Chege</option>

                        </select>
                    </div>
                        <div class="form-group">
                            <label for="sell">College Situated In <span class="text-danger"></span></label>
                                <select class="form-control selectpicker" id="sell" name="college_id" data-live-search="true">
                                    @foreach($college as $colleges)
                                    <option value="{{$colleges->id}}">{{$colleges->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Create School</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myCollege"><i class="fa fa-fw fa-plus"></i>New School</button>
    <br>
</div>


<div class="row">
    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
        <thead>

        <tr>
            <th>School Name</th>
            <th>School Head</th>
            <th>College Situated At</th>
            <th>Campus Situated At</th>
            <th>Action</th>
        </tr>

        </thead>


        <tbody>
        @forelse($school as $schools)
            <tr>
                <td>{{ $schools->school_name }}</td>
                <td>{{ $schools->name }}</td>

                @foreach($college as $colleges)
                    @if($colleges->id == $schools->college_id)
                        <td>{{ $colleges->name }}</td>
                    @endif
                @endforeach

                @foreach($college as $colleges)
                    @foreach($campus as $campuses)
                        @if($campuses->id == $colleges->campus_id)
                            @if($colleges->id == $schools->college_id)
                                <td>{{ $campuses->name }}</td>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                <td>
                    @if ($schools->status == 1)
                        <a href="{{url('academics/enabling/school')}}?id={{$schools->id}}&status=0" class="btn btn-danger" onclick="return confirm('Do you want to disable {{$schools->school_name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    @elseif($schools->status == 0)
                        <a href="{{url('academics/enabling/school')}}?id={{$schools->id}}&status=1" class="btn btn-custom" onclick="return confirm('Do you want to enable {{$schools->school_name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    @endif
                    <a data-toggle="modal" data-target="#mySchoolUpdate{{$schools->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                </td>
            </tr>


            <!-- Add User Modal -->
            <div class="modal fade" id="mySchoolUpdate{{$schools->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update School Details</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form"   method="POST" action="{{ url('academics/update/school') }}">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label  for="form-username">School Name<span class="text-danger">*</span></label>
                                        <input type="text" name="school_name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="sel1">School Head<span class="text-danger"></span></label>
                                        <select class="form-control selectpicker" id="sel1" name="name" data-live-search="true">
                                            <option value="1">Leon Lishenga</option>
                                            <option value="2">Mr Kiambi</option>
                                            <option value="3">Mr Chege</option>

                                        </select>
                                    </div>

                                    <input type="hidden" name="id" value="{{$schools->id}}">

                                    <div class="form-group">
                                        <label for="leo">College Situated In <span class="text-danger"></span></label>
                                        <select class="form-control selectpicker1" id="leo" name="college_id" data-live-search="true">
                                            @foreach($college as $colleges)
                                                <option value="{{$colleges->id}}">{{$colleges->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer form-group">
                                    <button type="submit" class="btn btn-info">Update School</button>
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
