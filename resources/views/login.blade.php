
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Login-Kaiboi Technical Training Institute </title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
          <link href="{{asset('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        @LaravelSweetAlertCSS

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Top content -->
      <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{asset('images/logo.png')}}" alt="" height="100"></span>
                                            </a>
                                        </h2>
                                        <p class="m-b-0"></p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="{{ url('/signin') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label for="emailaddress">UserName</label>
                                                    <input class="form-control" type="text" id="emailaddress" required="" placeholder="" name="username">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required="" name="password" placeholder="Enter your password">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Remember me
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>

                                        </form>

                                       

                                        

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>


        <!-- Javascript -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>
        @LaravelSweetAlertJS
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>