@extends('layouts.auth')

@section('content')
   <!-- Register -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <!-- Logo box-->
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="{{ route('register') }}" class="text-success">
                                                <span><img src="{{ asset('assets/img/prachee-logo.png') }}" alt="" height="28"></span>
                                            </a>
                                        </h2>
                                    </div>

                                    <div class="account-content">
                                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                 @csrf
                                            <div class="form-group mb-3">
                                         
                                                 <label for="name" class="font-weight-medium">{{ __('Name') }}</label>
                                             
                                                      
                                <input id="name"  placeholder="Michael Zenaty" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="email" class="font-weight-medium">Email address</label>
                                            
                                                <input id="email" placeholder="john@deo.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password" class="font-weight-medium">Password</label>
                                              
                                                 <input placeholder="Enter your password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>


                                    <div class="form-group mb-3">
                                        
                                                <label for="password-confirm" class="font-weight-medium">{{ __('Confirm Password') }}</label>
                                              
                                                  <input placeholder="Enter your password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>

                                       {{--      <div class="form-group mb-3">
                                                <div class="checkbox checkbox-info">
                                                    <input id="remember" type="checkbox" checked>
                                                    <label for="remember">
                                                        I accept <a href="#" class="text-muted">Terms and Conditions</a>
                                                    </label>
                                                </div>
                                            </div> --}}

                                            <div class="form-group">
                                                <button class="btn btn-block btn-success waves-effect waves-light" type="submit"> Sign Up</button>
                                            </div>
                                        </form> <!-- end form -->

                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-dark ml-1"><b>Sign In</b></a></p>
                                            </div>
                                        </div>

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
        <!-- END HOME -->    
@endsection
