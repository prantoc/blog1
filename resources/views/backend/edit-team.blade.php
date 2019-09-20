@extends('layouts.backend.dashboard')  
@section('backend-content')
<div class="col-lg-8">
        
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">{{$title}}</h4>
                                  {{--   <p class="text-muted font-14 m-b-20">
                                        Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                    </p> --}}
        
                                    <form method="POST" action="{{ route($route,$team->id) }}" enctype="multipart/form-data">
                                      @csrf
                                        <div class="form-group">
                                            <label for="name">Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" parsley-trigger="change" required="" placeholder="Jon Dev" class="form-control" id="userName" value="{{$team->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position<span class="text-danger">*</span></label>
                                            <input type="text" name="position" parsley-trigger="change" required="" placeholder="principal architect" class="form-control" id="emailAddress" value="{{$team->position}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="degree">Degree<span class="text-danger">*</span></label>
                                            <input type="text" name="degree" parsley-trigger="change" required="" placeholder="b. arch. (buet) 2001 m. arch. (buet) 2019" class="form-control" id="emailAddress" value="{{$team->degree}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="img">Image<span class="text-danger">*</span></label>
                                               
                                        <img src="{{asset('upload/'.$team->img)}}" alt="" height="100" width="180">
                                   
                                        <input type="file" name="img" value="{{ $team->img }}" class="form-control" id="inputZip">
                                        </div>
                                   
        
                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Update
                                            </button>
                                       {{--      <button type="reset" class="btn btn-light waves-effect m-l-5">
                                                Cancel
                                            </button> --}}
                                        </div>
        
                                    </form>
                                </div> <!-- end card-box -->
                            </div>

@endsection