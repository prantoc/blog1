@extends('layouts.frontend.home-design')
@section('content')
<section class="middle-sec-one mt-3">
   <div class="container-fluid">
      <div class="row text-center">
         <!-- <div class="col-md-2"></div> -->
         @foreach($clients as $c)
         <div class="col-lg-4 col-md-6 col-sm-6 mb-5">
            @if($c->img)
            <img src="{{asset('img/client/'.$c->img)}}" alt="$c->img" style="max-height: 180px;">
            @else
            <img src="{{asset('assets/img/no-image.jpg')}}" alt="John Doe" style="max-height: 180px;">
            @endif
            @guest
            @else
            <a href="{{route($eroute, $c->id)}}" class="btn btn-warning">Edit</a>
            @endif
         </div>
         @endforeach
      </div>
   </div>
</section>
@endsection