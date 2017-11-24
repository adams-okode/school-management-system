@include('layouts.header')

    <body>
        <!-- Navigation Bar-->
      @include('layouts.navbar')
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12" >
                        <div class="page-title-box" style="margin-top: -150px; color:#000;">
                            <div class="btn-group pull-right">
                            	@yield('breadcrumb') 
                            </div>
                            <h4 class="page-title">@yield('page_title')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
           @yield('content')
                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                {{ date('Y') }} © Kaiboi Technical Training Institute
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

<!-- Javascript files loaded here-->
    @include('layouts.scripts')
      
    </body>
</html>