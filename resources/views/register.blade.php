
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register-Kaiboi Technical Training Institute</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
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
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                  
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3><img src="images/logo.png"></h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <p class="pull-left text-primary">Register for Alana</p>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="{{ url('/signup') }}" method="post" class="login-form">
                                     {{ csrf_field() }}
                                     <div class="form-group">
                                        <label class="sr-only" for="form-username">Full Name</label>
                                        <input type="text" name="name" placeholder="Name..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Preffered Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>
                                     <div class="form-group">
                                        <label class="sr-only" for="form-username">Email Address</label>
                                        <input type="email" name="email" placeholder="Email Address..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Confirm Password</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn btn-success">Sign up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


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