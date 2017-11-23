<div class="row container">

    <div class="col-md-9">
        <h5 align="left"> Fee Items</h5>
        <br>
        <div class="row">
            <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="fee_item_data_number"  placeholder=" No of Items">
                    </div>      
            </div>
            <div class="col-md-2">
                <button type="" class="btn btn-primary" onclick="addfields();">add</button>    
            </div>
            <div class="col-md-7">
                
            </div>
        
        </div>

    
        <form method="POST" action="{{ url('finance/students/fee/set/items') }}">
            {{ csrf_field() }}
            <div class="row">
                <div id="fee_item_data">
                
                </div>

            </div>
            <br>
            <center><button type="submit" class="btn btn-primary">Create</button></center>
            
            
            
        </form>
        
        
    </div>


    <ul class="list-group col-md-3">
        @foreach($items as $key=> $value)
            <li class="list-group-item">{{$value}} <a href="{{ url('finance/students/remove/fee/item') }}?name={{$value}}">
                <span class="badge">
                <i class=" fa fa-times"></i>
            </span>
            </a></li>
        @endforeach
            
    </ul>
</div>

<script>
    function addfields() {

        var final = document.getElementById('fee_item_data_number').value;
        var fee_item_data = document.getElementById('fee_item_data');
        for (var i = 0; i < final; i++) {
            var item = '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<input type="text" name="item'+i+'" class="form-control" id="usr">'+
                            '</div>' +     
                        '</div>';
            fee_item_data.innerHTML+=item;            
                
        }
    
    }
    
    
</script>