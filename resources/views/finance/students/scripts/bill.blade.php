<script>
    function bill(q){


        switch (q) {
             case 1:
                    $( "#loading-wrapper" ).show();
                    $.ajax({
                        url: "{{ url('finance/students/billStudentsSimplified') }}",
                        type: 'post',
                        data:{'q':1,'course':document.getElementById('course_to_bill').value,'_token':'{{csrf_token()}}'},
                        xhr: function () {
                            var xhr = $.ajaxSettings.xhr();
                            xhr.onprogress = function e() {
                                // For downloads
                                if (e.lengthComputable) {
                                    document.getElementById('progress_data').value = e.loaded / e.total;
                                    console.log(e.loaded / e.total);
                                }
                            };
                            return xhr;
                        }
                    }).done(function (e) {
                        console.log(e);
                        document.getElementById('progress_data').innerHTML='<div class="alert alert-success">'+
                                                    '<strong>Success!</strong> Billing Done'+
                                                    ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                                                    '</div>';
                        $( "#loading-wrapper" ).hide(); 
                    }).fail(function (e) {
                        document.getElementById('progress_data').innerHTML='<div class="alert alert-danger">'+
                                                    '<strong>Error!</strong> '+
                                                    ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+

                                                    '</div>';
                        $( "#loading-wrapper" ).hide(); 
                    });
                break;

            case 2:
                    $( "#loading-wrapper" ).show();
                    $.ajax({
                        url: "{{ url('finance/students/billStudentsSimplified') }}",
                        type: 'post',
                        data:{'q':2,'batch':document.getElementById('batch_to_bill').value,'_token':'{{csrf_token()}}'},
                        xhr: function () {
                            var xhr = $.ajaxSettings.xhr();
                            xhr.onprogress = function e() {
                                // For downloads
                                if (e.lengthComputable) {
                                    document.getElementById('progress_data').value = e.loaded / e.total;
                                    console.log(e.loaded / e.total);
                                }
                            };
                            return xhr;
                        }
                    }).done(function (e) {
                        console.log(e);
                        document.getElementById('progress_data').innerHTML='<div class="alert alert-success">'+
                                                    '<strong>Success!</strong> Billing Done'+
                                                    ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+

                                                    '</div>';
                        $( "#loading-wrapper" ).hide(); 
                    }).fail(function (e) {
                    document.getElementById('progress_data').innerHTML='<div class="alert alert-danger">'+
                                                    '<strong>Error!</strong> '+
                                                    ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+

                                                    '</div>';
                        $( "#loading-wrapper" ).hide(); 
                });
                break;
        
            default:
                  $( "#loading-wrapper" ).show();
                    $.ajax({
                        url: "{{ url('finance/students/billStudents') }}",
                        type: 'get',
                        xhr: function () {
                            var xhr = $.ajaxSettings.xhr();
                            xhr.onprogress = function e() {
                                // For downloads
                                if (e.lengthComputable) {
                                    document.getElementById('progress_data').value = e.loaded / e.total;
                                    console.log(e.loaded / e.total);
                                }
                            };
                            return xhr;
                        }
                    }).done(function (e) {
                        console.log(e);
                        $( "#loading-wrapper" ).hide(); 
                        document.getElementById('progress_data').innerHTML='<div class="alert alert-success">'+
                                                    '<strong>Success!</strong> Billing Done'+
                                                    ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                                                    '</div>';
                    }).fail(function (e) {
                       document.getElementById('progress_data').innerHTML='<div class="alert alert-danger">'+
                                                    '<strong>Error!</strong> '+
                                                    ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+

                                                    '</div>';
                        $( "#loading-wrapper" ).hide(); 
                    });
                break;
        }
      
        
    }

</script>