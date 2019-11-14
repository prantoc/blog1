@extends('layouts.backend.dashboard')  
@section('backend-content')
<div class="col-lg-8">
   <div class="card-box">
      <h4 class="header-title m-t-0">{{$title}}</h4>
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
            <label for="img">Image<small class="text-dark font-weight-bold"> ( *if you don't want to change then you can blank ! )</small></label>
               @if($team->img)
                  <img src="{{asset('img/team/'.$team->img)}}" alt="" style="max-height: 180px;">
               @else
                  <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="max-height: 180px;">
               @endif
            <input type="file" name="img" value="{{ $team->img }}" class="form-control" id="inputZip">
            <span>(*you can upload max 5mb image file)</span>
         </div>
         <div class="form-group text-right m-b-0">
            <button class="btn btn-primary waves-effect waves-light" type="submit">
            Update
            </button>
         </div>
      </form>
   </div>
   <!-- end card-box -->
</div>
@endsection