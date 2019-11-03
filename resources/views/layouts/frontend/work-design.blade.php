<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>prachee sthapati</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- Booststrap & fontawsome Css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/venobox.css')}}">

     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('assets/js/4/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/4/ninja-slider.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/4/thumbnail-slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/4/ninja-slider.js')}}" type="text/javascript"></script>

    @yield('styles')

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

       <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' />

     <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">

    <meta name="theme-color" content="#fafafa">
</head>

<body>

        @include('layouts.frontend.headerwork')

        @yield('content')

        
        @include('layouts.frontend.footer')
       

        

    <script src="{{asset('assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('assets/js/venobox.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script >
        
    </script>
         @yield('scripts')

</body>

</html>