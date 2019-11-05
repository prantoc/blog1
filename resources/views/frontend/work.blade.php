@extends('layouts.frontend.work-design')
@section('content')
<section class="middle-sec-one mt-3 ml-2">
   <div class="container-fluid">
      <div class="row">
         @foreach($works as $work)
         <div class="col-lg-4 col-md-12 d-flex justify-content-md-center col-sm-12 col-xs-12 mb-3">
            <div class="hovereffect">
               @if($work->img)
               <img class="img-responsive" src="{{asset('work/feature/'.$work->img)}}" alt="$work->img" >
               @else
               <img class="img-responsive" src="{{asset('assets/img/no-image.jpg')}}" alt="John Doe" >
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
      </div>
   </div>
</section>
@endsection