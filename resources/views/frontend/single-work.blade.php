@extends('layouts.frontend.work-design')
  @section('content')
    <section class="middle-sec-one mt-3 ml-2">
        <div class="container-fluid">
            <div class="row">
                @foreach($works as $work)
                <!-- <div class="col-md-2"></div> -->
               <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        {{-- <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt=""> --}}
                        @if($work->img)
                              <img class="img-responsive" src="{{asset('img/feature/'.$work->img)}}" alt="$work->img" style="max-height: 180px;">
                              @else
                            <img class="img-responsive" src="{{asset('assets/img/no-image.jpg')}}" alt="John Doe" style="max-height: 180px;">
                            @endif
             
                        <div class="overlay">
                            <h2>{{$work->title}}</h2>
                            <a class="info" href="{{$work->id}}">See Full Post</a>
                        </div>
                    </div>
                </div>  
                @endforeach
               {{--  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt="">
                        <div class="overlay">
                            <h2>single family</h2>
                            <a class="info" href="singlefamily.html">See Full Post</a>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt="">
                        <div class="overlay">
                            <h2>single family</h2>
                            <a class="info" href="singlefamily.html">See Full Post</a>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt="">
                        <div class="overlay">
                            <h2>single family</h2>
                            <a class="info" href="singlefamily.html">See Full Post</a>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt="">
                        <div class="overlay">
                            <h2>single family</h2>
                            <a class="info" href="singlefamily.html">See Full Post</a>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        <img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt="">
                        <div class="overlay">
                            <h2>single family</h2>
                            <a class="info" href="singlefamily.html">See Full Post</a>
                        </div>
                    </div>
                </div>  --}}
           
            </div>
        </div>
        
    </section>
















  @endsection