@extends('layouts.frontend.home-design')
@section('content')
<section class="middle-sec-one mt-4 mb-5">
   <div class="container-fluid">
      <div class="row">
         <!-- <div class="col-md-2"></div> -->
         @if($teams->count())
         @foreach($teams as $t)
         <div class="col-md-6 col-sm-6 mb-5 pb-5">
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
         @else
          <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif
      </div>
   </div>
</section>
@endsection