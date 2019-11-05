@extends('layouts.frontend.home-design')
@section('content')
<section class="middle-sec-one mt-3 mb-5 pb-5">
   <div class="container-fluid">
      <div class="row">
         <!-- <div class="col-md-2"></div> -->
         <div class="col-md-12 col-sm-12 mb-5">
          {{--   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9951091016687!2d90.37962881543147!3d23.747549994801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b1022185e3%3A0x761fb85fb8dece12!2s58%20Kalabagan%201st%20Ln%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1567523301600!5m2!1sen!2sbd" width="1315" height="650" frameborder="0" style="border:0;" allowfullscreen=""></iframe> --}}
                   
            <div class="card-body" style="max-height: 550px;">
               @php $url = urlencode($adms->address) ; $url = htmlentities($url); @endphp
               <iframe width="1300" height="450" frameborder="0" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{ $url }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
               </iframe>
            </div>
           
         </div>
         <div class="col-md-3"></div>
         <div class="contact-detail text-center ml-5 font-weight-blod col-md-6">
            <!-- <a class="navbar-brand" href="index.html"><img src="img/prachee-logo.png" alt="prachee"></a> -->
            <div class="address">
               <p  class="font-weight-bold "> <i class="fas fa-envelope-square"></i> room F5, 3rd floor 113, lake circus 
                  kalabagan 
                  dhaka-1205
               </p>
            </div>
            <div class="phone">
               <p  class="font-weight-bold">
                  <i class="fas fa-phone-square"></i> 88 02 9112912
               </p>
            </div>
            <div class="email">
               <p  class="font-weight-bold">
                  <i class="fa fa-at"></i>  pracheesthapati@gmail.com
               </p>
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
   </div>
</section>
@endsection
@section('scripts')
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiAobbZlKHBizVrCVvqrIL9oKdRaS1v5Y&libraries=places&callback=initMap"></script> --}}
@endsection