<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
        <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css')}}"
        rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css')}}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/error.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
        <!-- END Custom CSS-->

        <!-- Fav Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="font-sans antialiased pt-5">
        <div class="app-content content mt-5 pt-5">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-md-4 col-10 p-0">
                                <div class="card-header bg-transparent border-0">
                                    <h2 class="error-code text-center mb-2">500</h2>
                                    <h3 class="text-uppercase text-center">Some thing went error !</h3>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script type="text/javascript" src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
        type="text/javascript"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN MODERN JS-->
        <script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
        <script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
        <!-- END MODERN JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="{{asset('app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS-->
        </body>
</html>
  