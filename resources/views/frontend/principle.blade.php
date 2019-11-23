@extends('layouts.frontend.home-design')
@section('content')
<section class="middle-sec-one mt-2 mb-5">
   <div class="container">
      @guest
      @else
      <a href="{{route($eroute, $pageimg->id)}}" class="btn btn-warning float-right">Edit</a>
      @endif
      <div class="row">
         <div class="col-lg-7 col-md-12 col-sm-12 mt-5">
            @if($pageimg->img)
              <img src="{{asset('img/pageimg/'.$pageimg->img)}}" alt="" width="468" height="356">
            @else
               <img class="img-responsive" src="{{asset('assets/img/noimage.jpg')}}" alt="" >
            @endif
         </div>
         <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="paragraph">
               <p class="mt-3">
                  {!! $pageimg->details !!}
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection