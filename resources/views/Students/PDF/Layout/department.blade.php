<!-- Add User Modal -->
<div class="modal fade" id="mydepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form"   method="POST" action="{{ url('/students/reports/batch/search') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Department Name<span class="text-danger">*</span></label>
                        <input type="text" name="search" placeholder="Department Name..." class="form-username form-control"  required parsley-type="text">
                    </div>

                    <input type="hidden" name="q" value="2">
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#mydepartment"><i class="fa fa-fw fa-plus"></i>Students per Department</button>
    <br>
</div>


