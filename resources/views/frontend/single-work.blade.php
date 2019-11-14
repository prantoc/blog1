@extends('layouts.frontend.work-design')
@section('content')
<section class="middle-sec-one mt-3 ml-2 mt-5 pt-5">
   <div class="container-fluid">
      <div class="row">
          @if($cats->count())
         @foreach($cats as $c)
         <!-- <div class="col-md-2"></div> -->
         <div class="col-lg-4 col-md-12 d-flex justify-content-md-center col-sm-12 col-xs-12 mb-3">
            <div class="hovereffect">
               {{-- <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt=""> --}}
               @if($c->img)
               <img class="img-responsive" src="{{asset('workfile/feature/'.$c->img)}}" alt="{{$c->title}}" style="max-height: 180px;">
               @else
               <img class="img-responsive" src="{{asset('assets/img/noimage.jpg')}}" alt="" style="max-height: 180px;">
               @endif
               <div class="overlay">
                  <h2>{{$c->title}}</h2>
                  <a class="info" href="{{route('work-img-page',$c->slug)}}">See Full Post</a>
                  @guest
                  @else
                  <a href="{{route($eroute, $c->id)}}" class="btn btn-warning">Edit</a>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
             @else
         <span class="btn btn-dark w-md px-5 py-2 mt-2 mb-2 ml-5  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif
      </div>
   </div>
</section>
@endsection