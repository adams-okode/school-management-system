    <!-- Add User Modal -->
    <div class="modal fade" id="myledgers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Ledger</h4>
        </div>
        <div class="modal-body">
        <form role="form"   method="POST" action="{{ url('finance/create/ledger') }}">
            {{ csrf_field() }}
        <div class="form-group">
            <label  for="form-username">Ledger Name <span class="text-danger">*</span></label>
            <input type="text" name="ledgerName" placeholder="" class="form-username form-control"  required parsley-type="text">
        </div>

        <div class="form-group">
            <label for="sel1">Financial Year <span class="text-danger">*</span></label>
            <select class="form-control selectpicker" id="sel1" name="financialYearId" data-live-search="true">
               @foreach($years as $year)
                 <option value="{{$year->id}}">{{$year->yearName}}</option>
               @endforeach
                
            </select>
        </div>
        
        <div class="form-group">
        <button type="submit" class="btn btn-info">Create Ledger</button>
    </div>
    </form>
        </div>
       
        </div>
    </div>
    </div>
<!-- End Add User Modal --> 



    <div class="row" align="left">
        <br>
        <button class="btn btn-custom" data-toggle="modal" data-target="#myledgers"><i class="fa fa-fw fa-plus"></i>New Ledger</button>
        <br>
        Ledgers
    </div>
    <div class="row">
        <table id="" class="datatable table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>

            <tr>
                <th>Ledger Name</th>
               
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($ledgers as $ledger)
                <tr>
                    <td>{{ $ledger->ledgerName }}</td>
                    
                    <td>
                        <a href="{{ url('finance/delete/ledger') }}?id={{$ledger->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a data-toggle="modal" data-target="#myledgerUpdate{{$ledger->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>



            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>

     @forelse($ledgers as $ledger)
      
                <!-- Add User Modal -->
                <div class="modal fade" id="myledgerUpdate{{$ledger->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update Ledger</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form"   method="POST" action="{{ url('finance/update/ledger') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label  for="form-username">Ledger Name <span class="text-danger">*</span></label>
                            <input type="text" name="ledgerName" placeholder="" class="form-username form-control"  required parsley-type="text">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Financial Year <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sel1" name="financialYearId" data-live-search="true">
                            @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->yearName}}</option>
                            @endforeach
                                
                            </select>
                        </div>
                   
                    <input type="hidden" name="id" value="{{$ledger->id}}">
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
                </form>
                    </div>
                   
                    </div>
                </div>
                </div>
            <!-- End Add User Modal --> 

            @empty
                   
            @endforelse