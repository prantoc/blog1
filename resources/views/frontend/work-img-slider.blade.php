@extends('layouts.frontend.work-design')
@section('styles')
{{-- <style>
  .item{

  height: 300px;
  position: relative;
}
.owl-theme .owl-dots .owl-dot span{
    width: 20px;
    height: 20px;
    margin: 5px 7px;
    display: block;
    -webkit-backface-visibility: visible;
    transition: opacity .2s ease;
    border-radius: 0;
    margin-left: 0px;
}
.owl-carousel .owl-item img {
    display: block;
    width: 100%;
    size: cover;
    height: 300px;
}
.owl-theme .owl-dots{

    float: left;
}
.owl-theme .owl-dots .owl-dot.active span{
  background: yellow;
}
.slidercontrol .owl-nav{
  float: left;
}
.slidercontrol .owl-nav .prvBtn{

}
.prvBtn{
  font-size: 40px;
  /* background: red; */
  margin-top: -200px;
  margin-left: -150px;

  position: absolute;
  z-index: 99999;

}
.nxtBtn{
  font-size: 40px;
  /* background: red; */
  margin-top: -200px;
  margin-left: 900px;

  position: absolute;
  z-index: 99999;
}

.text{
  position: absolute;
  height: 20px;
  width: 20px;
  background: #D6D6D6;
  margin-top: 15px;
  color: white;

}
.owl-dots {
position: relative;
}
.owl-dot .fab{
  position: absolute;
  margin-left: -50px;
  margin-top: 17px;
  background: none;
  z-index: 999;

}
.owl-dot .fas{
  position: absolute;
  margin-left: -25px;
  margin-top: 17px;
  background: none;
  z-index: 999;

}
.owl-theme .owl-dots .owl-dot.active span {
  background: yellow;
}

.carousel-control-prev:active{

} 

</style> --}}

   {{--  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('assets/js/4/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/4/ninja-slider.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/4/thumbnail-slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/4/ninja-slider.js')}}" type="text/javascript"></script> --}}
@endsection
@section('content')
{{-- <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel" data-interval="false">

   <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
       @if($cats->count())
      @foreach($cats as $key => $c)

      @if($c->file_type == 1)

      <div class="carousel-item text-dark text-center   {{$key == 0 ? 'active' : '' }}"  style="font-size: 25px; font-weight: bold;">
            {!! $c->details !!}
      </div>

      @elseif($c->file_type == 2)
      
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="background-image: url('{{asset('workfile/img/'.$c->file)}}')">
      </div>

        @elseif($c->file_type == 3)
      
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}">

         <video controls autoplay muted loop id="myVideo" width="880" class="ml-5 justify-content-center text-center">
           <source src="{{asset('workfile/video/'.$c->file)}}" type="video/mp4" >
         </video>
      </div>

      @endif
      @endforeach
   </div>
   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
   </a>


</div>

 <span class="s-icon carousel-inner float-left"><i class="fab fa-tumblr-square ml-3 float-left"></i></span>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
   <span class=" ml-3" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>


<span class="s-icon carousel-inner  float-left"><i class="fas fa-image ml-3 "></i></span>
   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
   <span class=" ml-3" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>

@guest
@else
<a href="{{route($eroute, $c->id)}}" class="btn btn-warning ml-3">Edit</a>
@endif

        @else
         <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif

 --}}










{{-- 


     <div class="container">
     <div class="col-md-12">

            @if($cats->count())

         <div class="owl-carousel owl-theme slider">
      @foreach($cats as $c)
      @if($c->file_type == 1)

            <div class="item">
              <a class="venobox text-dark text-center" data-gall="myGallery" href="{{$c->details}}" style="font-size: 25px; font-weight: bold;">
                   
                    {!! $c->details !!}
              </a>
            </div>

            @elseif($c->file_type == 2)
            <div class="item">
              <a class="venobox" data-gall="myGallery" href="{{asset('workfile/img/'.$c->file)}}">
                <img src="{{asset('workfile/img/'.$c->file)}}" alt=""/>
              </a>
            </div>
        


           @endif
      @endforeach
          </div>


            <div class="slidercontrol">
              <div class="owl-nav">
                <div class=" nxtBtn"><i class="fa fa-angle-double-left"></i></div>
                <div class="prvBtn"><i class="fa fa-angle-double-right"></i></div>
             </div>
    
                 <div class="owl-dots">
            

                     <div class="owl-dot "><span><i class="fab fa-tumblr-square"></i></span></div>

               
                    <div class="owl-dot "><span><i class="fas fa-image"></i></span></div>

                 
                 </div>
                  
                 </div>
                        @else
         <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif

              
       </div>
       </div>
       --}}

   {{--   <div class="container">
     <div class="col-md-12"> --}}


            @if($cats->count())
    <!--start-->
    <div id="ninja-slider" class=" mb-5">
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
                    <li><a class="ns-img" href="{{asset('workfile/img/'.$c->file)}}"></a>

          

                    </li>
                    @endif
              @endforeach
                </ul>
                {{-- <div class="fs-icon" title="Expand/Close"></div> --}}
            </div>
            <div id="thumbnail-slider">
                <div class="">
                    <ul>
@foreach($cats as $ct)
                      @if($ct->file_type == 1)
                        <li>
                            <a class="thumb" href="{{asset('assets/img/y.png')}}" height="20"></a>
                          {{--   <span><i class="fab fa-tumblr-square"></i></span> --}}
                        </li>
                          @elseif($ct->file_type == 2)
                        <li>
                            <a class="thumb" href="{{asset('assets/img/i.png')}}" height="20"></a>
                            {{-- <span><img src="{{asset('assets/img/i.png')}}" alt="" height="20" width="20"></span> --}}
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

              
    </div>
    </div>







@endsection
@section('scripts')
{{-- <script>
  $('.slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
var owl = $('.slider');
owl.owlCarousel();
// Go to the next item
$('.prvBtn').click(function() {
    owl.trigger('next.owl.carousel');
});
// Go to the previous item
$('.nxtBtn').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
});
$(document).ready(function(){
   $('.venobox').venobox();


});
$('.item').venobox({
       framewidth: '600px',
       frameheight: '300px',
       border: '',
       bgcolor: '',
       titleattr: 'data-title',
       numeratio: false,
       infinigall: false
   });

</script> --}}
{{-- <script>

  $('.slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
});

var owl = $('.slider');
owl.owlCarousel();
// Go to the next item
$('.nxtBtn').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prvBtn').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
});

$(document).ready(function(){
    $('.venobox').venobox();
});

$('.venobox').venobox({
     framewidth: '400px',        // default: ''
     frameheight: '300px',       // default: ''
     border: '10px',             // default: '0'
     bgcolor: '#5dff5e',         // default: '#fff'
     titleattr: 'data-title',    // default: 'title'
     numeratio: true,            // default: false
     infinigall: true            // default: false
 });

</script> --}}
@endsection