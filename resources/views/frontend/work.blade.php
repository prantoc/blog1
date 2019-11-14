@extends('layouts.frontend.work-design')
@section('content')
<section class="middle-sec-one mt-md-5 pt-md-5 mt-5 ml-2 pt-5">
   <div class="container-fluid">
      <div class="row">
         @if($works->count())
         @foreach($works as $work)
         <div class="col-lg-4 col-md-12 d-flex justify-content-md-center col-sm-12 col-xs-12 mb-3">
            <div class="hovereffect">
               @if($work->img)
               <img class="img-responsive" src="{{asset('work/feature/'.$work->img)}}" alt="$work->img" >
               @else
               <img class="img-responsive" src="{{asset('assets/img/noimage.jpg')}}" alt="John Doe" >
               @endif
               <div class="overlay">
                  <h2>{{$work->title}}</h2>
                  <a class="info" href="{{route('all-work-single',$work->slug)}}">See Full Post</a>
                  @guest
                  @else
                  <a href="{{route($eroute, $work->id)}}" class="btn btn-warning">Edit</a>
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