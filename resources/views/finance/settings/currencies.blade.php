    <!-- Add User Modal -->
    <div class="modal fade" id="myCurrency" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Currency</h4>
        </div>
        <div class="modal-body">
        <form role="form"   method="POST" action="{{ url('finance/create/currency') }}">
            {{ csrf_field() }}
                    <div class="form-group">
                            <label  for="form-username"> Currency Name <span class="text-danger">*</span></label>
                            <input type="text" name="currencyName" placeholder="" class="form-username form-control" value="" required parsley-type="text">
                        </div>

                        <div class="form-group">
                            <label  for="form-username"> Prefix <span class="text-danger">*</span></label>
                            <input type="text" name="tag" placeholder="" class="form-username form-control" value="" required parsley-type="text">
                        </div>
        
        <div class="form-group">
        <button type="submit" class="btn btn-info">Create Currency</button>
    </div>
    </form>
        </div>
       
        </div>
    </div>
    </div>
<!-- End Add User Modal --> 



    <div class="row" align="left">
        <br>
        <button class="btn btn-custom" data-toggle="modal" data-target="#myCurrency"><i class="fa fa-fw fa-plus"></i>New Currency</button>
        <br>
        Currencies
    </div>
    <div class="row">
        <table id="datatable" class="datatable table table-striped table-condensed table-bordered table-colored table-primary">
            <thead>

            <tr>
                <th>Currency Name</th>
                <th>Prefix</th>
                <th>Action</th>
            </tr>

            </thead>


            <tbody>
            @forelse($currencies as $currency)
                <tr>
                    <td>{{ $currency->currencyName }}</td>
                    <td>{{ $currency->tag }}</td>
                    <td>
                        <a href="{{ url('finance/delete/currency') }}?id={{$currency->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')"><i class="fa fa-fw fa-trash"></i></a>
                        <a data-toggle="modal" data-target="#myCurrencyUpdate{{$currency->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                    </td>
                </tr>



            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>

     @forelse($currencies as $currency)
                <!-- Add User Modal -->
                <div class="modal fade" id="myCurrencyUpdate{{$currency->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update Vote</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form"   method="POST" action="{{ url('finance/update/currency') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label  for="form-username"> Currency Name <span class="text-danger">*</span></label>
                            <input type="text" name="currencyName" placeholder="" class="form-username form-control" value="{{$currency->currencyName}}" required parsley-type="text">
                        </div>

                        <div class="form-group">
                            <label  for="form-username"> Prefix <span class="text-danger">*</span></label>
                            <input type="text" name="tag" placeholder="" class="form-username form-control" value="{{$currency->tag}}" required parsley-type="text">
                        </div>

                        

                        
                    
                    <input type="hidden" name="id" value="{{$currency->id}}">
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