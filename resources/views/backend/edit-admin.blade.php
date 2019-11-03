@extends('layouts.backend.dashboard')  
@section('backend-content')
<!-- Register -->
<section>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="wrapper-page">
               <div class="account-pages">
                  <div class="account-box">
                     <!-- Logo box-->
                     <div class="account-content">
                        <form class="form-horizontal" method="POST" action="{{ route($uroute, $admin->id) }}">
                           @csrf
                           <div class="form-group mb-3">
                              <label for="name" class="font-weight-medium">{{ __('Name') }}</label>
                              <input id="name"  placeholder="Michael Zenaty" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-3">
                              <label for="email" class="font-weight-medium">Email address</label>
                              <input id="email" placeholder="john@deo.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="email">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                     {{--       <div class="form-group mb-3">
                              <label for="password" class="font-weight-medium">Set Password</label>
                              <input placeholder="Enter your password" id="password" type="password" disabled="disabled" class=" disabled form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group mb-3">
                              <label for="password-confirm" class="font-weight-medium">{{ __('Confirm Password') }}</label>
                              <input disabled="disabled" placeholder="Enter your password" id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                           </div> --}}
                           <div class="form-group">
                              <button class="btn btn-block btn-success waves-effect waves-light" type="submit">Update </button>
                           </div>
                        </form>
                        <!-- end form -->
                     </div>
                     <!-- end account-content -->
                  </div>
                  <!-- end account-box -->
               </div>
               <!-- end account-page-->
            </div>
            <!-- end wrapper-page -->
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- END HOME --> 
@endsection