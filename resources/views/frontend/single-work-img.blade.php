@extends('layouts.frontend.work-design')
@section('content')
<section class="middle-sec-one mt-3 ml-2 mt-5">
   <div class="container-fluid">
      <div class="row">
          @if($workfiles->count())
         @foreach($workfiles as $c)
         <!-- <div class="col-md-2"></div> -->
         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
            <div class="hovereffect">
               {{-- <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt=""> --}}
               @if($c->file)
               <img class="img-responsive" src="{{asset('workfile/img/'.$c->file)}}" alt="$c->img" style="max-height: 180px;">
               @else
               <img class="img-responsive" src="{{asset('assets/img/noimage.jpg')}}" alt="John Doxe" style="max-height: 180px;">
               @endif
               <div class="overlay">
                  <h2>{{$c->title}}</h2>
                  <a class="info" href="{{$c->id}}">See Full Post</a>
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