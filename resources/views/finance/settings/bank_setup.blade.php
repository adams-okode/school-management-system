    <!-- Add User Modal -->
    <div class="modal fade" id="myBankAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Bank</h4>
        </div>
        <div class="modal-body">
        <form role="form"   method="POST" action="{{ url('finance/create/bankAccount') }}">
            {{ csrf_field() }}
        <div class="form-group">
            <label  for="form-username">Account Name <span class="text-danger">*</span></label>
            <input type="text" name="AccountName" placeholder="" class="form-username form-control"  required parsley-type="text">
        </div>
        <div class="form-group">
            <label  for="form-username">Account Number <span class="text-danger">*</span></label>
            <input type="text" name="AccountNumber" placeholder="" class="form-username form-control"  required parsley-type="text">
        </div>
        <div class="form-group">
            <label  for="form-username">Closing Balance<span class="text-danger">*</span></label>
            <input type="text" name="ClosingBalance" placeholder="" class="form-username form-control"  required parsley-type="text">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-info">Create Bank</button>
    </div>
    </form>
        </div>
       
        </div>
    </div>
    </div>
<!-- End Add User Modal --> 



    <div class="row" align="left">
        <br>
        <button class="btn btn-custom" data-toggle="modal" data-target="#myBankAccount"><i class="fa fa-fw fa-plus"></i>New Bank</button>
        <br>
        Bank Accounts
    </div>
    <div class="row">
        <table id="" class="datatable table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>

            <tr>
                <th>Account</th>
                <th>Acc Number</th>
                <th>Balance</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($banks as $bank)
                <tr>
                    <td>{{ $bank->AccountName }}</td>
                    <td>{{ $bank->AccountNumber }}</td>
                    <td>{{ $bank->ClosingBalance }}</td>
                    <td>
                        <a href="{{ url('finance/delete/bankAccount') }}?id={{$bank->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a data-toggle="modal" data-target="#myBankAccountUpdate{{$bank->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>



            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>

     @forelse($banks as $bank)
      
                <!-- Add User Modal -->
                <div class="modal fade" id="myBankAccountUpdate{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update Bank Account</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form"   method="POST" action="{{ url('finance/update/bankAccount') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Account Name <span class="text-danger">*</span></label>
                        <input type="text" name="AccountName" placeholder="" value="{{$bank->AccountName}}" class="form-username form-control"  required parsley-type="text">
                    </div>
                    <div class="form-group">
                        <label  for="form-username">Account Number <span class="text-danger">*</span></label>
                        <input type="text" name="AccountNumber" placeholder="" value="{{$bank->AccountNumber}}"  class="form-username form-control"  required parsley-type="text">
                    </div>
                    <div class="form-group">
                        <label  for="form-username">Closing Balance<span class="text-danger">*</span></label>
                        <input type="text" name="ClosingBalance" placeholder="" value="{{$bank->ClosingBalance}}" class="form-username form-control"  required parsley-type="text">
                    </div>
                    <input type="hidden" name="id" value="{{$bank->id}}">
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Create Year</button>
                </div>
                </form>
                    </div>
                   
                    </div>
                </div>
                </div>
            <!-- End Add User Modal --> 

            @empty
                   
            @endforelse