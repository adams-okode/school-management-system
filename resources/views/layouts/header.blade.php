
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Dashboard- Kaiboi Technical Training Institute</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Alana- Kaiboi Technical Training Institute" name="description" />
        <meta content="Alana" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{asset('dist/plugins/morris/morris.css')}}">
 <!-- DataTables -->
        <link href="{{asset('dist/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('dist/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

        <!-- App css -->
        <link href="{{asset('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dist/assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/loading.css')}}" rel="stylesheet" type="text/css">
        
        @LaravelSweetAlertCSS
        @yield('styles')

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('dist/assets/js/modernizr.min.js')}}"></script>
        

    </head>