<!-- Add User Modal -->
<div class="modal fade" id="myPrimary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Primary School Details</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('HR/employee/create') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">School Name<span class="text-danger">*</span></label>
                        <input type="text" name="School" placeholder="School Name..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Date Started<span class="text-danger">*</span></label>
                        <input type="date" name="Date_Started" placeholder="Date Started..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Date Finished<span class="text-danger">*</span></label>
                        <input type="date" name="Date_Finished" placeholder="Date Finished..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Certificates<span class="text-danger">*</span></label>
                        <input type="file" name="Documents[]" placeholder="Choose all of them at once..." class="form-username form-control"  required parsley-type="text" multiple>
                    </div>

                    <input type="hidden" name="q" value="3">
                    <input type="hidden" name="Employee_id" value="{{$employee->id}}">
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myPrimary"><i class="fa fa-fw fa-plus"></i>Primary School Details</button>
    <br>
</div>


