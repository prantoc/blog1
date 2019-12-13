{{-- @extends('layouts.frontend.work-design')
@section('content')
@if($cats->count())
  <!--start-->
    <div id="ninja-slider" class=" mb-5 mt-4 pt-5">
            <div class="slider-inner">
              <ul>
                @foreach($cats as $c)
                  @if($c->file_type == 1)
                    <li>
                      <span class="text-center" style="font-size: 15px; font-weight: bold;">
                   
                        {!! $c->details !!}
                      </span>
                    </li>

                  @elseif($c->file_type == 2)
                    <li>
                      <a class="ns-img" href="{{asset('workfile/img/'.$c->file)}}"></a>
                    </li>
                  @elseif($c->file_type == 4)
                    <li>
                      <a class="ns-img" href="{{asset('workfile/img/'.$c->file)}}"></a>
                    </li>
                  @endif
                @endforeach
                </ul>
            </div>
            <div id="thumbnail-slider">
                <div class="">
                    <ul>
                      @foreach($cats as $ct)
                        @if($ct->file_type == 1)
                          <li>
                            <a class="thumb" href="{{asset('assets/img/t.jpg')}}" height="20"></a>
                          </li>
                        @elseif($ct->file_type == 2)
                          <li>
                            <a class="thumb" href="{{asset('assets/img/image.jpg')}}" height="20"></a>
                          </li>

                        @elseif($ct->file_type == 4)
                          <li>
                            <a class="thumb" href="{{asset('assets/img/hatch.jpg')}}" height="20"></a>
                          </li>
                        @endif
                      @endforeach     
                    </ul>
                </div>
            </div>
        </div>

  @else
    <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
  @endif







@endsection
 --}}



@extends('layouts.frontend.home-design')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
     @foreach($cats as $key => $c)
    <div class="carousel-item {{$key == 0 ? 'active' : '' }} active">
    @if($c->file_type == 1)
      <div class="carousel-caption text-dark" style="font-size: 22px; font-weight: bold;position: absolute;top: 0%;">
        
        <p>{!! $c->details !!}</p>
      </div>
       @elseif($c->file_type == 2)
      <img src="{{asset('assets/img/t.jpg')}}" class="d-block w-100" alt="">
          @endif
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection