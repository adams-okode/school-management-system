  <!-- jQuery  -->
        <script src="{{ asset('dist/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/waves.js')}}"></script>
        <script src="{{ asset('dist/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('dist/assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('assets/js/mdb.min.js')}}"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="{{ asset('dist/plugins/jquery-knob/excanvas.js')}}"></script>
        <![endif]-->
        <script src="{{ asset('dist/plugins/jquery-knob/jquery.knob.js')}}"></script>

        <!-- Dashboard init -->
        <script src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('dist/plugins/datatables/dataTables.bootstrap.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


        
        <!-- init -->
        <script src="{{ asset('assets/pages/jquery.datatables.init.js')}}"></script>
         <!-- Parsley js -->
        <script type="text/javascript" src="{{ asset('dist/plugins/parsleyjs/parsley.min.js')}}"></script>

        <!--Form Wizard-->
        <script src="{{ asset('dist/plugins/jquery.stepy/jquery.stepy.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('dist/plugins/jquery.select-all.min.js')}}" type="text/javascript"></script>
        <!--wizard initialization-->
        <script src="{{ asset('dist/assets/pages/jquery.wizard-init.js')}}" type="text/javascript"></script>
        <!-- App js -->
        <script src="{{ asset('dist/assets/js/jquery.core.js')}}"></script>
        <script src="{{ asset('dist/assets/js/jquery.app.js')}}"></script>
        @LaravelSweetAlertJS
        <script type="text/javascript">
            $(document).ready(function () {
                $('form').parsley();
                $('#datatable').dataTable({
                    "paging":true
                });
                $('.datatable').dataTable({
                    "paging":true
                });
            });
            $(function(){
            $(".dropdown").hover(            
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                        $(this).toggleClass('open');
                        $('b', this).toggleClass("caret caret-up");                
                    },
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                        $(this).toggleClass('open');
                        $('b', this).toggleClass("caret caret-up");                
                    });
            });
    
        </script>
        @yield('scripts')
