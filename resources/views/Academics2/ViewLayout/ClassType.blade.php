<!-- Add User Modal -->
<div class="modal fade" id="myClassType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Class Type</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('academics/ClassType') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Class Type<span class="text-danger">*</span></label>
                        <input type="text" name="Name" placeholder="Class Type..." class="form-username form-control"  required parsley-type="text">
                    </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#myClassType"><i class="fa fa-fw fa-plus"></i>Create Class Type</button>
    <br>
</div>


