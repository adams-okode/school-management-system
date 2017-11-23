<!-- Add User Modal -->
<div class="modal fade" id="myFail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Types of Failure</h4>
            </div>
            <form role="form"   method="POST" action="{{ url('/students/continue/action') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="form-control selectpicker" id="sel1" name="Academic_Status" data-live-search="true">
                            <option value="EXPULSION">EXPULSION</option>
                            <option value="DISCONTINUATION">DISCONTINUATION</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label  for="form-username">Reason<span class="text-danger">*</span></label>
                        <textarea rows="4" cols="50" name="AcademicDescription" class="form-username form-control"  required parsley-type="text">
                        </textarea>
                    </div>
                    <input type="hidden" name="q" value="0">
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
    <button class="btn btn-custom" data-toggle="modal" data-target="#myFail"><i class="fa fa-fw fa-plus"></i>Fail</button>
    <br>
</div>


