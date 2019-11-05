@extends('layouts.backend.dashboard')  
@section('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.15/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<style>
   .catscroll{
   min-height: 42px;
   max-height: 200px;
   overflow: auto;
   }
</style>
@endsection
@section('backend-content')
<form method="POST" action="{{ route($route, $post->id) }}" enctype="multipart/form-data" >
   @csrf
   <div class="row">
      @if($fileimg)
      <div class="col-md-8" id="meditor">
         <div class="m-b-30">
            <select id="inputState" class="form-control" name="workfile_id" required>
               <option class="disabled">Choose Workfile</option>
               @foreach($workfiles as $work)
               <option value="{{$work->id}}" {{ $work->id == $post->workfile->id ? 'selected': '' }}>{{$work->title}}</option>
               @endforeach
            </select>
         </div>
         <div class="m-b-30">
            <div class="m-b-30">
               <select id="inputState" class="form-control" name="file_type" required>
                  <option class="disabled">Choose workfile type</option>
                  @foreach($workfiletypes as $work)
                  <option value="{{$work->id}}"  {{ $work->id == $post->workfiletype->id ? 'selected': '' }}>{{$work->type}}</option>
                  @endforeach
               </select>
            </div>
            <div class="float-right">
               <button type="button" class="btn btn-icon btn-light" id="fullWidth"> <i class="icon-size-fullscreen" id="fic"></i> </button>
            </div>
            @if($post->file_type == 1)
            <textarea name="details" id="details" cols="82" rows="17">{{ $post->details }}</textarea>
            @elseif($post->file_type == 2)
            <div class="form-group col-md-12 card-box dropzone"  id="myAwesomeDropzone">
               <label for="inputZip" class="col-form-label">Upload Work File(Image/Video)</label>
               {{-- @if($post->file_type == 2) --}}
               @if($post->file)
               <img src="{{asset('workfile/img/'.$post->file)}}" alt="" style="max-height: 180px;">
               @else
               <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="max-height: 180px;">
               @endif
               {{-- @endif --}}
               <input type="file" name="file" value="{{ old('file') }}" class="form-control" id="inputZip" multiple />
               <span>(*you can upload max 5mb image file)</span>
            </div>
            @elseif($post->file_type == 3)
            <video width="320" height="240" controls>
               <source src="{{asset('workfile/video/'.$post->file)}}" type="video/mp4">
            </video>
            <input type="file" name="file" value="{{ old('file') }}" class="form-control" id="inputZip" multiple />
            <span>(*you can upload max 5mb video file)</span>
            @endif
         </div>
      </div>
    {{--   @endif
      @if($fileimg) --}}
      <div class="col-md-4" id="seditor">
         <div class="card m-b-30 card-body">
            <h5 class="card-title">Update workfile Image</h5>
            <button type="submit" class="btn btn-block btn-primary">Update</button>
         </div>
      </div>
      @endif
      <div class="col-md-8" id="meditor">
         @if($drpDwn)
         <div class="m-b-30">
            <input id="title" type="text" class="form-control form-control-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $post->workfile->title }}" required autofocus placeholder="Enter Page Title">
            <div class="float-right">
               <button type="button" class="btn btn-icon btn-light" id="fullWidth"> <i class="icon-size-fullscreen" id="fic"></i> </button>
            </div>
            <select id="inputState" class="form-control" name="work_id" required>
               <option class="disabled">Choose Work</option>
               @foreach($works as $work)
               <option value="{{$work->id}}"  {{ $work->id == $post->work->id ? 'selected': '' }}>{{$work->title}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group col-md-12 card-box dropzone"  id="myAwesomeDropzone">
            <label for="inputZip" class="col-form-label">Feature Image</label>
            @if($post->workfile->img)
            <img src="{{asset('workfile/feature/'.$post->workfile->img)}}" alt="" style="max-height: 180px;">
            @else
            <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="max-height: 180px;">
            @endif
            <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="inputZip" multiple />
            <span>(*you can upload max 5mb video file)</span>
         </div>
         @endif
         @if($fileType)
         <div class="m-b-30">
            <input id="title" type="text" class="form-control form-control-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" name="type" value="{{ $post->type }}" required autofocus placeholder="Enter Page Title">
            <div class="float-right">
               <button type="button" class="btn btn-icon btn-light" id="fullWidth"> <i class="icon-size-fullscreen" id="fic"></i> </button>
            </div>
         </div>
         <div class="card m-b-30 card-body">
            <h5 class="card-title">Update File Type</h5>
            <button type="submit" class="btn btn-block btn-primary">Update File Type</button>
         </div>
         @endif
      </div>
      <div class="col-md-4" id="seditor">
         {{--          @if($drpDwn)
         <div class="form-group col-md-12 card-box dropzone"  id="myAwesomeDropzone">
            <label for="inputZip" class="col-form-label">Feature Image</label>
            @if($post->img)
            <img src="{{asset('workfile/feature/'.$post->img)}}" alt="" style="max-height: 180px;">
            @else
            <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="max-height: 180px;">
            @endif
            <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="inputZip" multiple />
         </div>
         @endif --}}
         @if($hasCats)
         <div class="form-group col-md-12 card-box dropzone"  id="myAwesomeDropzone">
            <label for="inputZip" class="col-form-label">Uploadff (Image/Video)</label>
            {{-- <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="inputZip"> --}}
            <input type="file" name="file" value="{{ old('file') }}" class="form-control" id="inputZip" multiple />
         </div>
         @endif
         @if($drpDwn)
         <div class="card m-b-30 card-body">
            <h5 class="card-title">Update work file</h5>
            <button type="submit" class="btn btn-block btn-primary">Update</button>
         </div>
         @endif
      </div>
   </div>
</form>
@endsection 
@section('scripts')
<script>
   var but = $('#fullWidth');
   var medit = $('#meditor');
   var sedit = $('#seditor');
   var fic = $('#fic');
  
   but.on('click', function(event) {
  
       var nmedit = medit.hasClass("col-md-8");
       if (nmedit) {
           // nmedit.removeClass('col-md-8');
           medit.removeClass('col-md-8')
           medit.addClass('col-md-12');
           sedit.removeClass('col-md-4')
           sedit.addClass('col-md-12');
           fic.removeClass('icon-size-fullscreen');
           fic.addClass('icon-size-actual');
  
       } else {
           medit.removeClass('col-md-12')
           medit.addClass('col-md-8');
           sedit.removeClass('col-md-12')
           sedit.addClass('col-md-4');
           fic.removeClass('icon-size-actual');
           fic.addClass('icon-size-fullscreen');
       }
  
   });
</script>
<script>
   for(var els = document.getElementsByClassName("cat-delete"), i = els.length; i--;){
       els[i].href = 'javascript:void(0);';
       els[i].onclick = (function(el){
           return function(){
               swal({
                 title: 'Are you sure?',
                 text: "You won't be able to revert this!",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                 if (result.value) {
                   window.location.href = el.getAttribute('data-href');
                   swal({
                     title: 'Deleting!',
                      text: 'Your file is being deleted.',
                     timer: 2000,
                     onOpen: () => {
                       swal.showLoading()
                       timerInterval = setInterval(() => {
                         swal.getContent().querySelector('strong')
                           .textContent = swal.getTimerLeft()
                       }, 100)
                     },
                     onClose: () => {
                       clearInterval(timerInterval)
                     }
                 }
  
                   )
                 }
               })
              
           };
       })(els[i]);
   }
  
  
  
   $('#datatable1').DataTable({
       keys: true
   });
</script>
<!-- select2 js -->
<script src="{{ asset('assets/backend/libs/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/mohithg-switchery/switchery.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<!-- Mask input -->
<script src="{{ asset('assets/backend/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<!-- Bootstrap Select -->
<script src="{{ asset('assets/backend/libs/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/moment/moment.js')}}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/backend/libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Init Js file -->
<script src="{{ asset('assets/backend/js/jquery.form-advanced.js')}}"></script>
<script></script>
@endsection