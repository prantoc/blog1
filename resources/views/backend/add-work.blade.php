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
<form method="POST" action="{{ route($aroute) }}" enctype="multipart/form-data" >
   @csrf
   <div class="row">
      <div class="col-md-8" id="meditor">
      @if($hasCats)
         <div class="m-b-30">
            <input id="title" type="text" class="form-control form-control-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus placeholder="Enter Page Title">
         {{--  <div class="form-group col-md-12 card-box dropzone mt-3"  id="myAwesomeDropzone">
             <label for="inputZip" class="col-form-label">{{$works->position}}}</label>
            <input id="title" type="text" class="form-control form-control-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus placeholder="Enter Page Title">
          </div> --}}
            <div class="float-right">
               <button type="button" class="btn btn-icon btn-light" id="fullWidth"> <i class="icon-size-fullscreen" id="fic"></i> </button>
            </div>
          <div class="form-group col-md-12 card-box dropzone mt-3"  id="myAwesomeDropzone">
            <label for="inputZip" class="col-form-label">Feature Image <small style="color: red;">(*Not Mandatory)</small> </label>
            <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="inputZip" multiple />
            <span>(*you can upload max 5mb image file)</span>
         </div>
         </div>
         @endif
         @if($drpDwn)
          <div class="m-b-30">
            <input id="title" type="text" class="form-control form-control-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus placeholder="Enter Page Title">
            <div class="float-right">
               <button type="button" class="btn btn-icon btn-light" id="fullWidth"> <i class="icon-size-fullscreen" id="fic"></i> </button>
            </div>
             <select id="inputState" class="form-control" name="work_id" required>
                <option class="disabled">Choose Work</option>
                @foreach($works as $work)
                <option value="{{$work->id}}">{{$work->title}}</option>
                @endforeach
             </select>   
            <div class="form-group col-md-12 card-box dropzone mt-4"  id="myAwesomeDropzone">
               <label for="inputZip" class="col-form-label">Feature Image <small style="color: red;">(*Not Mandatory)</small></label>
               <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="inputZip" multiple />
               <span>(*you can upload max 5mb image file)</span>
            </div>
          </div>
         @endif
      </div>
       @if($hasCats)
      <div class="col-md-4" id="seditor">
         <div class="card m-b-30 card-body">
            <h5 class="card-title">Publish Work</h5>
            <button type="submit" class="btn btn-block btn-primary">Publish</button>
         </div>
      </div>
      @endif
      @if($drpDwn)
      <div class="col-md-4" id="seditor">
         <div class="card m-b-30 card-body">
            <h5 class="card-title">Publish WorkFile</h5>
            <button type="submit" class="btn btn-block btn-primary">Publish</button>
         </div>
      </div>
      @endif
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