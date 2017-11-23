<div class="row">
    <form method="POST" action="{{ url('finance/students/batchfee') }}">
        {{ csrf_field() }}
        <div class="col-md-4">
            <div class="form-group">
                <select class="selectpicker" data-live-search="true" required name="batch_id" title="Select Batch">
                @foreach($batches as $batch)
                        <option data-tokens="{{ $batch->Batch_name}}" value="{{ $batch->id }}">{{ $batch->Batch_name }}</option>
                @endforeach
                    
                </select>
            </div>
        </div>    
        @foreach($items as $key=> $value)
            <div class="col-md-4">
                <div class="form-group">
                    <input type="number" class="form-control" name="{{$value}}" placeholder="{{$value}}">
                </div>      
            </div>
        @endforeach
                <button type="submit" class="btn btn-primary"> Save</button>

    </form>
    
</div>


<div class="row">
<div class="">
        <table  class=" datatable table table-striped table-condensed table-bordered table-colored table-custom">
            <thead>

            <tr>
                <th>Batch</th>
                @foreach($items as $key=> $value)
                    <th>{{$value}}</th>
                @endforeach
                
                <th>Amount</th>
                
            </tr>

            </thead>


            <tbody>
            @forelse($batch_fees as $fee)
            <tr>
                <td>{{$fee->batch->Batch_name}}</td>
                @foreach($items as $key=> $value)
                 <td>{{$fee->$value}}</td>
                @endforeach
                <td>{{$fee->amount}}</td>
                
            </tr>
            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
</div>

    
</div>