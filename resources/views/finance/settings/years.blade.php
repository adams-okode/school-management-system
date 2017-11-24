    <!-- Add User Modal -->
    <div class="modal fade" id="myFinancialYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Customer</h4>
        </div>
        <div class="modal-body">
        <form role="form"   method="POST" action="{{ url('finance/create/financialYear') }}">
            {{ csrf_field() }}
        <div class="form-group">
            <label  for="form-username">Year Name <span class="text-danger">*</span></label>
            <input type="text" name="yearName" placeholder="Name..." class="form-username form-control"  required parsley-type="text">
        </div>
        <div class="form-group">
            <label  for="form-username">From Date<span class="text-danger">*</span></label>
            <input type="date" name="from" placeholder="Pin No" class="form-username form-control"  required parsley-type="text">
        </div>
        
        <div class="form-group">
            <label  for="form-password">To Date <span class="text-danger">*</span></label>
            <input type="date" name="to" placeholder="Phone Number..." class="form-password form-control"  required parsley-type="password">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-info">Create Year</button>
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
        <button class="btn btn-custom" data-toggle="modal" data-target="#myFinancialYear"><i class="fa fa-fw fa-plus"></i>New Year</button>
        <br>
        Financial Years
    </div>
    <div class="row">
        <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>

            <tr>
                <th>Name</th>
                <th>From</th>
                <th>To</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($years as $year)
                <tr>
                    <td>{{ $year->yearName }}</td>
                    <td>{{ $year->from }}</td>
                    <td>{{ $year->to }}</td>
                    <td>
                        <a href="{{ url('finance/delete/financialYear') }}?id={{$year->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a data-toggle="modal" data-target="#myFinancialYearUpdate{{$year->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>


                <!-- Add User Modal -->
                <div class="modal fade" id="myFinancialYearUpdate{{$year->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Financial Year</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form"   method="POST" action="{{ url('finance/update/financialYear') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Year Name <span class="text-danger">*</span></label>
                        <input type="text" name="yearName" value="{{$year->yearName}}" class="form-username form-control"  required parsley-type="text">
                    </div>
                    <div class="form-group">
                        <label  for="form-username">From Date<span class="text-danger">*</span></label>
                        <input type="date" name="from" value="{{$year->from}}" class="form-username form-control"  required parsley-type="text">
                    </div>

                    <input type="hidden" name="id" value="{{$year->id}}">
                    
                    <div class="form-group">
                        <label  for="form-password">To Date <span class="text-danger">*</span></label>
                        <input type="date" name="to" value="{{$year->to}}" class="form-password form-control"  required parsley-type="password">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Create Year</button>
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

     @forelse($years as $year)
       <!-- Add User Modal -->
                <div class="modal fade" id="myFinancialYearUpdate{{$year->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update Financial Year</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form"   method="POST" action="{{ url('finance/update/financialYear') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="form-username">Year Name <span class="text-danger">*</span></label>
                        <input type="text" name="yearName" value="{{$year->yearName}}" class="form-username form-control"  required parsley-type="text">
                    </div>
                    <div class="form-group">
                        <label  for="form-username">From Date<span class="text-danger">*</span></label>
                        <input type="date" name="from" value="{{$year->from}}" class="form-username form-control"  required parsley-type="text">
                    </div>

                    <input type="hidden" name="id" value="{{$year->id}}">
                    
                    <div class="form-group">
                        <label  for="form-password">To Date <span class="text-danger">*</span></label>
                        <input type="date" name="to" value="{{$year->to}}" class="form-password form-control"  required parsley-type="password">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Create Year</button>
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
                   
            @endforelse