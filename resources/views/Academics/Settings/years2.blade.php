<!-- Add User Modal -->
<div class="modal fade" id="myCollege" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New College</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('settings/create/college') }}">
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label  for="form-username">College Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                        </div>
                        <div class="form-group">
                            <label for="sell">Type <span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="sell" name="campus_id" data-live-search="true">
                                    @foreach($campus as $campuses)
                                    <option value="{{$campuses->id}}">{{$campuses->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Create College</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myCollege"><i class="fa fa-fw fa-plus"></i>New College</button>
    <br>
</div>


<div class="row">
    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
        <thead>

        <tr>
            <th>College Name</th>
            <th>Campus Situated At</th>
            <th>Action</th>
        </tr>

        </thead>


        <tbody>
        @forelse($college as $colleges)
            <tr>
                <td>{{ $colleges->name }}</td>

                @foreach($campus as $campuses)
                    @if($campuses->id == $colleges->campus_id)
                        <td>{{ $campuses->name }}</td>
                    @endif
                @endforeach

                <td>
                    @if ($colleges->status == 1)
                        <a href="{{url('settings/enabling/college')}}?id={{$colleges->id}}&status=0" class="btn btn-danger" onclick="return confirm('Do you want to disable {{$colleges->name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    @elseif($colleges->status == 0)
                        <a href="{{url('settings/enabling/college')}}?id={{$colleges->id}}&status=1" class="btn btn-custom" onclick="return confirm('Do you want to enable {{$colleges->name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    @endif
                    <a data-toggle="modal" data-target="#myCollegeUpdate{{$colleges->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                </td>
            </tr>


            <!-- Add User Modal -->
            <div class="modal fade" id="myCollegeUpdate{{$colleges->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update College Details</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form"   method="POST" action="{{ url('settings/update/college') }}">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label  for="form-username">College Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                                    </div>

                                    <input type="hidden" name="id" value="{{$colleges->id}}">

                                    <div class="form-group">
                                        <label for="leo">Type <span class="text-danger">*</span></label>
                                        <select class="form-control selectpicker1" id="leo" name="campus_id" data-live-search="true">
                                            @foreach($campus as $campuses)
                                                <option value="{{$campuses->id}}">{{$campuses->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer form-group">
                                    <button type="submit" class="btn btn-info">Update College</button>
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
