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
            <p class="text-white mb-0 mt-2">Total Admin</p>
            <h3 class="text-white">{{ $totalAdmins }}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-primary bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Clients</p>
            <h3 class="text-white">{{ $totalClients }}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Team Members</p>
            <h3 class="text-white">{{ $totalTeams }}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-dark bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Work</p>
            <h3 class="text-white">{{ $totalWorks }}</h3>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-lg-4 col-md-6">
      <div class="card-box widget-chart-one gradient-danger bx-shadow-lg">
         <div class="text-right">
            <p class="text-white mb-0 mt-2">Total Appliers</p>
            <h3 class="text-white">{{ $totalAppliers }}</h3>
         </div>
      </div>
   </div>
</div>
      
@endsection