@extends('layouts.auth')

@section('content')
<!-- Login -->
        <section>
            <div class="container">
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
                    <div class="col-12">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <!-- Logo box-->
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="{{ route('login') }}" class="text-success">
                                                <span><img src="{{ asset('assets/img/prachee-logo.png') }} " alt="" height="28"></span>
                                            </a>
                                        </h2>
                                    </div>

                                    <div class="account-content">
                                         @isset($url)
                                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                                        @else
                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @endisset
                                        @csrf
                                            <div class="form-group mb-3">
                                                @isset($url)
                                                <label for="username" class="font-weight-medium">Username/email</label>
                                               <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('username'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                                @else
                                                <label for="email" class="font-weight-medium">Email</label>
                                               <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                                @endisset
                                            </div>

                                            <div class="form-group mb-3">
                                                {{-- <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a> --}}
                                                <label for="password" class="font-weight-medium">Password</label>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="checkbox checkbox-info">
                                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row text-center">
                                                <div class="col-12">
                                                    <button class="btn btn-block btn-success waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>
                                        </form> <!-- end form -->

                                       {{--  <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Don't have an account? <a href="{{route('register')}}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                            </div>
                                        </div> --}} <!-- end row-->
                                    </div> <!-- end account-content -->

                                </div> <!-- end account-box -->
                            </div>
                            <!-- end account-page-->
                        </div>
                        <!-- end wrapper-page -->

                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
@endsection
