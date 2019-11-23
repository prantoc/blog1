@extends('layouts.frontend.work-design')
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
                {{-- <div class="fs-icon" title="Expand/Close"></div> --}}
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