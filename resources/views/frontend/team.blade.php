@extends('layouts.frontend.home-design')
@section('content')
<section class="middle-sec-one mt-3 mb-5">
   <div class="container-fluid">
      <div class="row">
         <!-- <div class="col-md-2"></div> -->
         @foreach($teams as $t)
         <div class="col-md-6 col-sm-6 mb-5">
            <div class="row text-center justify-content-center">
               <div class="col-md-2 col-sm-6 profile-img">
                  @if($t->img)
                  <img src="{{asset('img/team/'.$t->img)}}" alt="$t->img" style="max-height: 180px;">
                  @else
                  <img src="{{asset('assets/img/noimage.jpg')}}" alt="$t->name" style="max-height: 180px;">
                  @endif
               </div>
               <div class="col-md-8 col-sm-6">
                  <h2>{{$t->name}}</h2>
                  <h5>{{$t->position}}</h5>
                  <h6>{{$t->degree}}</h6>
               </div>
               <div>
                  @guest
                  @else
                  <a href="{{route($eroute, $t->id)}}" class="btn btn-warning">Edit</a>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endsection