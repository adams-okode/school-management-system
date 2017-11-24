<!-- Add User Modal -->
<div class="modal fade" id="myCampus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Campus</h4>
            </div>
            <div class="modal-body">
                <form role="form"   method="POST" action="{{ url('settings/create/Campus') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Campus Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-info">Create Campus</button>
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

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myCampus"><i class="fa fa-fw fa-plus"></i>New Campus</button>
    <br>
</div>


<div class="row">
    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
        <thead>

        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>

        </thead>


        <tbody>
        @forelse($campus as $campuses)
            <tr>
                <td>{{ $campuses->name }}</td>
                <td>
                    @if ($campuses->status == 1)
                        <a href="{{url('settings/enabling/campus')}}?id={{$campuses->id}}&status=0" class="btn btn-danger" onclick="return confirm('Do you want to disable {{$campuses->name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    @elseif($campuses->status == 0)
                        <a href="{{url('settings/enabling/campus')}}?id={{$campuses->id}}&status=1" class="btn btn-custom" onclick="return confirm('Do you want to enable {{$campuses->name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    @endif
                    <a data-toggle="modal" data-target="#myCampusUpdate{{$campuses->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                </td>
            </tr>


            <!-- Add User Modal -->
            <div class="modal fade" id="myCampusUpdate{{$campuses->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update Campus Details</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form"   method="POST" action="{{ url('settings/update/Campus') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label  for="form-username">Campus Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{$campuses->name}}" class="form-username form-control"  required parsley-type="text">
                                </div>

                                <input type="hidden" name="id" value="{{$campuses->id}}">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Update Campus</button>
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




        @empty
            <p>No Data Found</p>
        @endforelse
        </tbody>
    </table>
</div>
