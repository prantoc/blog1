@extends('layouts.frontend.home-design')
  @section('content')
    <section class="middle-sec-one mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7 col-sm-12 paragraph">
                    @guest
                        @else
                            <a href="{{route($eroute, $page->id)}}" class="btn btn-warning float-right">Edit</a>
                    @endif
                    <p>
                       {!! $page->details !!}
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
  @endsection