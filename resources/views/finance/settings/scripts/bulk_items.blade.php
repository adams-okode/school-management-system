<script>

    localStorage.removeItem('bill_item');
    var billing_field=document.getElementById('billing_field_place');
    var billing = {
       add_items:function(){
            
            if (!localStorage.bill_item) {

                localStorage.bill_item=1;

            }else{

                localStorage.bill_item = parseInt(localStorage.bill_item)+1;
            }
            
            var item = '<div class="row">'+
                    '<div class="col-md-11">'+
                        '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<label for="sel1">Select Items to inculde In Invoice:</label>'+
                            '<select class="form-control conti'+localStorage.bill_item+' selectpicker" data-live-search="true" name="items_'+localStorage.bill_item+'">'+
                                '<option>Mustard</option>'+
                                '<option>Ketchup</option>'+
                                '<option>Relish</option>'+
                            '</select>'+
                        '</div>'+    
                    '</div>'+

                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<label for="sel1">No of Items:</label>'+
                            '<input type="number" class="form-control" name="no_of_items" value="">'+
                        '</div>' +
                    '</div>'+

                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<label for="sel1">Total Billable Amount:</label>'+
                            '<input type="number" class="form-control" name="Amount" value="">'+
                        '</div>'+ 
                    '</div>'+
                    '</div>'+

                    '<div class="col-md-1">'+
                    '<div class="form-group">'+
                    '<br>'+
                        '<a class="btn btn-transparent" style="margin-top:5px;" onclick="billing.add_items();"><i class=" fa fa-fw fa-plus "></i></a>'+
                    '</div>'+  
                    '</div>'+   
                    '</div>';

            billing_field.innerHTML += item;   
            $('.conti'+localStorage.bill_item+'').selectpicker('refresh');   


            
       },
   };

   billing.add_items();
</script>