@extends('layouts.frontend.home-design')
  @section('content')


           <div class="row">

                        <div class="col-12">
                        <!--  ==================================SESSION MESSAGES==================================  -->
                            @if (session()->has('message'))
                                <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! session()->get('message')  !!}
                                </div>
                            @endif
                        <!--  ==================================SESSION MESSAGES==================================  -->


                        <!--  ==================================VALIDATION ERRORS==================================  -->
                            @if($errors->any())
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {!!  $error !!}
                                    </div>

                            @endforeach
                         @endif
                        <!--  ==================================SESSION MESSAGES==================================  -->
                        </div>
                    </div>

    <section class="middle-sec-one mt-3 mb-5">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-5 col-sm-6 mb-5">
                  <form method="POST" action="{{ route('post-apply') }}" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Subject</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="subject">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Upload your CV</label>
                        <input type="file" class="form-control bg-secondary" id="exampleFormControlInput1" name="up_cv">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Upload your Portfolio</label>
                        <input type="file" class="form-control bg-secondary" id="exampleFormControlInput1" name="up_protfolio">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mgs"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-7 col-sm-6 mb-5">
                    <p>
                        {!! $page->details !!}
                    </p>

                      @guest
                        @else
                        <a href="{{route($eroute, $page->id)}}" class="btn btn-warning">Edit</a>
                         @endif
                </div>
              
            </div>

        </div>
        
    </section>

  @endsection