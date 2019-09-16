@extends('layouts.backend.dashboard')
@section('backend-content')

<div class="row">
   <div class="col-lg-12">
      <!--  ==================================SESSION MESSAGES==================================  -->
      <!--  ==================================SESSION MESSAGES==================================  -->
   </div>
</div>
<div class="row">
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Labs</p>
            <h3 class="text-white">{{-- {{ $totalLabs }} --}}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-primary bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Patients</p>
            <h3 class="text-white">{{-- {{ $totalPatients }} --}}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Doctor</p>
            <h3 class="text-white">{{-- {{ $totalDoctors }} --}}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-dark bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Hospitals</p>
            <h3 class="text-white">{{-- {{ $totalHospitals }} --}}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-danger bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Appointment</p>
            <h3 class="text-white">{{-- {{ $totalApps }} --}}</h3>
         </div>
      </div>
   </div>
 {{--   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Notices</p>
            <h3 class="text-white">7</h3>
         </div>
      </div>
   </div> --}}
</div>
      
@endsection