<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>prachee sthapati</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    {{-- <link rel="apple-touch-icon" href="icon.png"> --}}
    <!-- Place favicon.ico in the root directory -->
    <!-- Booststrap & fontawsome Css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">


    <!-- Sweet Alert css -->
    <link href="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/Prachee-Thumb.png')}}">

    <meta name="theme-color" content="#fafafa">
</head>

<body>

        @include('layouts.frontend.header')

        @yield('content')

        
        @include('layouts.frontend.footer')
       

        

    <script src="{{asset('assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
    <!-- Sweet Alert Js  -->
    <script src="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.sweet-alert.init.js') }}"></script>

{{--     
    <script>
        
        if(!function_exists('is_active_menu')){

            function is_active_menu($url){

            return \Route::is($url) ? 'active' : '';
            }

        }
    </script> --}}

        <script>
            @if (session()->has('message'))
                swal({
                title: "{!! session()->get('title')  !!}",
                text: "{!! session()->get('message')  !!}",
                type: "{!! session()->get('type')  !!}",
                confirmButtonText: "OK"
            });
                {{ Session::forget('message')}}
            @endif
        </script>

</body>

</html>