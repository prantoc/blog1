<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Prachee Sthapati</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.ico') }}">

        <!-- Icons css -->
        <link href="{{ asset('assets/backend/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/backend/libs/dripicons/webfont/webfont.css') }} " rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/backend/libs/simple-line-icons/css/simple-line-icons.css') }} " rel="stylesheet" type="text/css" />

        <!-- App css -->
        <!-- build:css -->
        <link href="{{ asset('assets/backend/css/app.css') }} " rel="stylesheet" type="text/css" />
        <!-- endbuild -->

    </head>

    <body class="bg-account-pages">
         @yield('content')

        
        <!-- END HOME -->    


        <!-- jQuery  -->
        <script src="{{ asset('assets/backend/libs/jquery/jquery.min.js') }} "></script>
        <script src="{{ asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('assets/backend/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/backend/libs/metismenu/metisMenu.min.js') }} "></script>

        <!-- App js -->
        <script src="{{ asset('assets/backend/js/jquery.core.js') }} "></script>
        <script src="{{ asset('assets/backend/js/jquery.app.js') }} "></script>

    </body>
</html>
