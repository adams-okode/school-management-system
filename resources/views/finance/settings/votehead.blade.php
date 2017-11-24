    <!-- Add User Modal -->
    <div class="modal fade" id="myVoteheads" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Votehead</h4>
        </div>
        <div class="modal-body">
        <form role="form"   method="POST" action="{{ url('finance/create/voteAccount') }}">
            {{ csrf_field() }}
        <div class="form-group">
            <label  for="form-username"> Vote Name <span class="text-danger">*</span></label>
            <input type="text" name="AccountName" placeholder="" class="form-username form-control"  required parsley-type="text">
        </div>

        <div class="form-group">
            <label for="sel1">Ledger <span class="text-danger">*</span></label>
            <select class="form-control selectpicker" id="sel1" name="ledger_id" data-live-search="true">
               @foreach($ledgers as $ledger)
                 <option value="{{$ledger->id}}">{{$ledger->ledgerName}}</option>
               @endforeach  
            </select>
        </div>

        <div class="form-group">
            <label for="sel1">Type <span class="text-danger">*</span></label>
            <select class="form-control selectpicker" id="sel1" name="Type" data-live-search="true">
                 <option value="1">Income Account</option>
                 <option value="2">Expense Account</option>
                 <option value="3">Suspense Account</option>
               
            </select>
        </div>
        
        <div class="form-group">
        <button type="submit" class="btn btn-info">Create Votehead</button>
    </div>
    </form>
        </div>
       
        </div>
    </div>
    </div>
<!-- End Add User Modal --> 



    <div class="row" align="left">
        <br>
        <button class="btn btn-custom" data-toggle="modal" data-target="#myVoteheads"><i class="fa fa-fw fa-plus"></i>New VoteHead</button>
        <br>
        Vote Heads
    </div>
    <div class="row">
        <table id="" class="datatable table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>

            <tr>
                <th>Vote Name</th>
                <th>Closing Balance</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($voteheads as $votehead)
                <tr>
                    <td>{{ $votehead->AccountName }}</td>
                    <td>{{ $votehead->ClosingBalance }}</td>
                    <td>
                        <a href="{{ url('finance/delete/voteAccount') }}?id={{$votehead->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a data-toggle="modal" data-target="#myVoteAccountUpdate{{$votehead->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>



            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>

     @forelse($voteheads as $votehead)
      
                <!-- Add User Modal -->
                <div class="modal fade" id="myVoteAccountUpdate{{$votehead->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update Vote</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form"   method="POST" action="{{ url('finance/update/voteAccount') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label  for="form-username"> Vote Name <span class="text-danger">*</span></label>
                            <input type="text" name="AccountName" placeholder="" class="form-username form-control" value="{{$votehead->AccountName}}" required parsley-type="text">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Ledger <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sel1" name="ledger_id" data-live-search="true">
                            @foreach($ledgers as $ledger)
                                <option value="{{$ledger->id}}">{{$ledger->ledgerName}}</option>
                            @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Type <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="sel1" name="Type" data-live-search="true">
                                <option value="1">Income Account</option>
                                <option value="2">Expense Account</option>
                                <option value="3">Suspense Account</option>
                            
                            </select>
                        </div>
                    
                    <input type="hidden" name="id" value="{{$votehead->id}}">
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