<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>prachee sthapati</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/Prachee-Thumb.png')}}">

        <!-- jvectormap -->
        <link href="{{asset('assets/backend/libs/jqvmap/jqvmap.min.css')}}" rel="stylesheet" />


        <!-- Icons css -->
        <link href="{{asset('assets/backend/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/backend/libs/dripicons/webfont/webfont.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/backend/libs/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css" />

        <!-- font-awesome css cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <!-- build:css -->
        <link href="{{asset('assets/backend/css/app.css')}}" rel="stylesheet" type="text/css" />
        <!-- endbuild -->

        <!-- Sweet Alert css -->
        <link href="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@yield('styles')
@yield('top-styles')

    </head>

    <body>


        @include('layouts.backend.backend-header')

        @include('layouts.backend.sidebar')
                 <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <!-- Page title box -->
                      <div class="page-title-box">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">pracheesthapati dashboard</a></li>
                                <li class="breadcrumb-item active">{{$title}}</li>
                            </ol>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    <!-- End page title box -->

                    <div class="row">
                        <div class="col-12">
                        <!--  ==================================SESSION MESSAGES==================================  -->
                            @if (session()->has('message'))
                                <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! session()->get('message')  !!}
                                </div>
                            @endif
                        <!--  ==================================SESSION MESSAGES==================================  -->


                        <!--  ==================================VALIDATION ERRORS==================================  -->
                            @if($errors->any())
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {!!  $error !!}
                                    </div>

                            @endforeach
                         @endif
                        <!--  ==================================SESSION MESSAGES==================================  -->
                        </div>
                    </div>

        @yield('backend-content')

                </div> <!-- end container-fluid-->
            </div> <!-- end contant-->
        </div>

        @include('layouts.backend.backend-footer')

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>


        </div>
        <!-- End #wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('assets/backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/metismenu/metisMenu.min.js')}}"></script>

        <!-- KNOB JS -->
        <script src="{{asset('assets/backend/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- Chart JS -->
        <script src="{{asset('assets/backend/libs/chart.js/Chart.bundle.min.js')}}"></script>

        <!-- Jvector map -->
        <script src="{{asset('assets/backend/libs/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

           <!-- Sweet Alert Js  -->
        <script src="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/jquery.sweet-alert.init.js') }}"></script>

        <!-- Dashboard Init JS -->
        <script src="{{asset('assets/backend/js/jquery.dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/backend/js/jquery.core.js')}}"></script>
        <script src="{{asset('assets/backend/js/jquery.app.js')}}"></script>


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


         @yield('scripts')

    </body>
</html>