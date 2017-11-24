<div class="modal fade" id="mySuspend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Types of Suspension</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('/students/continue/action') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="form-control selectpicker" id="sel1" name="Academic_Status" data-live-search="true">
                            <option value="STAYOUT">STAYOUT</option>
                            <option value="SUSPEND">SUSPEND</option>
                            <option value="ACADEMICLEAVE">ACADEMIC LEAVE</option>

                        </select>
                    </div>
                    <input type="hidden" name="q" value="1">
                    <input type="hidden" name="id" value="{{$student->id}}">
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-info">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->

<div class="row" align="left">
    <button class="btn btn-custom" data-toggle="modal" data-target="#mySuspend"><i class="fa fa-fw fa-plus"></i>Suspend</button>
    <br>
</div>