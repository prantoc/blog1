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


     .border{
    border-bottom:1px solid #F1F1F1;
    margin-bottom:10px;
  }
  .main-secction{
    box-shadow: 10px 10px 10px;
  }
  .image-section{
    padding: 0px;
  }
  .image-section img{
    width: 100%;
    height:250px;
    position: relative;
  }
  .user-image{
    position: absolute;
    margin-top:-30px;
  }
  .user-left-part{
    margin: 0px;
  }
  .user-image img{
    width:100px;
    height:100px;
  }
  .user-profil-part{
    padding-bottom:30px;
    background-color:#FAFAFA;
  }
  .follow{    
    margin-top:80px;   
  }
  .user-detail-row{
    margin:0px; 
  }
  .user-detail-section2 p{
    font-size:12px;
    padding: 0px;
    margin: 0px;
  }
  .user-detail-section2{
    margin-top:10px;
  }
  .user-detail-section2 span{
    color:#7CBBC3;
    font-size: 20px;
  }
  .user-detail-section2 small{
    font-size:12px;
    color:#D3A86A;
  }
  .profile-right-section{
    padding: 20px 0px 10px 15px;
    background-color: #FFFFFF;  
  }
  .profile-right-section-row{
    margin: 0px;
  }
  .profile-header-section1 h1{
    font-size: 25px;
    margin: 0px;
  }
  .profile-header-section1 h5{
    color: #0062cc;
  }
  .req-btn{
    height:30px;
    font-size:12px;
  }
  .profile-tag{
    padding: 10px;
    border:1px solid #F6F6F6;
  }
  .profile-tag p{
    font-size: 12px;
    color:black;
  }
  .profile-tag i{
    color:#ADADAD;
    font-size: 20px;
  }
  .image-right-part{
    background-color: #FCFCFC;
    margin: 0px;
    padding: 5px;
  }
  .img-main-rightPart{
    background-color: #FCFCFC;
    margin-top: auto;
  }
  .image-right-detail{
    padding: 0px;
  }
  .image-right-detail p{
    font-size: 12px;
  }
  .image-right-detail a:hover{
    text-decoration: none;
  }
  .image-right img{
    width: 100%;
  }
  .image-right-detail-section2{
    margin: 0px;
  }
  .image-right-detail-section2 p{
    color:#38ACDF;
    margin:0px;
  }
  .image-right-detail-section2 span{
    color:#7F7F7F;
  }

  .nav-link{
    font-size: 1.2em;    
  }
</style>
@endsection
@section('backend-content')

        <div class="row card">
            <div class="row user-left-part ">
                <div class="col-md-4 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">

                          <div class="download-cv mb-2 follow">
                              @php
                              $filepath = 'uploaded_cv/';
                              $hasfile = 0;
                              if(File::exists($filepath)){
                                if($apply->up_cv){
                                  $filetype = mime_content_type($filepath.$apply->up_cv);
                                  $filesize = filesize($filepath.$apply->up_cv);
                                  $filesize = round($filesize / 1024, 2);
                                }
                                $hasfile = 1;
                              }
                              @endphp

                              @if ( $hasfile && $apply->up_cv && mime_content_type($filepath.$apply->up_cv) == 'application/pdf')
                                <div class="mailbox-attachment-info"> 
                                    <a href="{{ route('home') }}/{{ $filepath }}{{ $apply->up_cv }}" id="btn-contact" class="btn btn-success btn-block">Download CV <i class="far fa-file-pdf"></i> {!! str_limit($apply->up_cv,6) !!} <i class="fas fa-cloud-download-alt"></i></a> 
                                </div>


                              @elseif( $hasfile && $apply->up_cv && ($filetype == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $filetype == 'application/msword'))
                                <div class="mailbox-attachment-info">
                                    <a href="{{ route('home') }}/{{ $filepath }}{{ $apply->up_cv }}" id="btn-contact" class="btn btn-success btn-block">Download CV <i class="far fa-file-word"></i> {!! str_limit($apply->up_cv,6) !!} <i class="fas fa-cloud-download-alt"></i></a> 
                                </div>
                            
                              @endif 
                          </div>


                            <div class="download-cv mb-2">
                              @php
                              $filepath = 'uploaded_cv/';
                              $hasfile = 0;
                              if(File::exists($filepath)){
                                if($apply->up_protfolio){
                                  $filetype = mime_content_type($filepath.$apply->up_protfolio);
                                  $filesize = filesize($filepath.$apply->up_protfolio);
                                  $filesize = round($filesize / 1024, 2);
                                }
                                $hasfile = 1;
                              }
                              @endphp

                              @if ( $hasfile && $apply->up_protfolio && mime_content_type($filepath.$apply->up_protfolio) == 'application/pdf')
                                <div class="mailbox-attachment-info"> 
                                    <a href="{{ route('home') }}/{{ $filepath }}{{ $apply->up_protfolio }}" id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-warning btn-block">Download Protfolio <i class="far fa-file-pdf"></i> {!! str_limit($apply->up_protfolio,6) !!} <i class="fas fa-cloud-download-alt"></i></a> 
                                </div>


                              @elseif( $hasfile && $apply->up_protfolio && ($filetype == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $filetype == 'application/msword'))
                                <div class="mailbox-attachment-info">
                                    <a href="{{ route('home') }}/{{ $filepath }}{{ $apply->up_protfolio }}"class="btn btn-warning btn-block">Download Protfolio <i class="far fa-file-word"></i> {!! str_limit($apply->up_protfolio,6) !!} <i class="fas fa-cloud-download-alt"></i></a> 
                                </div>
                            
                              @endif 
                          </div>                              
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-8 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1>{{$apply->name}}</h1>
                                    <h5>Applier</h5>
                                </div>
                          
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Applier Information</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-envelope-open-text"></i> Applier Message</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
                                              <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                        <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>ID</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{$apply->id}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Name</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{$apply->name}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{$apply->email}}</p>
                                                                </div>
                                                            </div>
                                                           
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                  <div class="row">
                                                      <div class="col-md-12" id="meditor">
                                                         <div class="m-b-30">
                                                          <label for="inputZip" class="col-form-label">Subject</label> <small class="text-dark font-weight-bold"> ( *You can't edit this field ! )</small><br>
                                                            <input id="subject" type="text" class="form-control form-control-lg {{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ $apply->subject }}" required autofocus placeholder="Enter Page Title" readonly="readonly">
                                                            <div class="float-right">
                                                               <button type="button" class="btn btn-icon btn-light" id="fullWidth"> <i class="icon-size-fullscreen" id="fic"></i> </button>
                                                            </div>
                                                         </div>
                                                         <label for="inputZip" class="col-form-label">Message</label> <small class="text-dark font-weight-bold"> ( *You can't edit this field ! )</small><br>
                                                         <textarea name="mgs" id="mgs" cols="92" rows="17" disabled disabled="disabled">{{$apply->mgs }}</textarea>
                                                      </div>
                                                                                                  
                                                  </div>
                                                
                                              </div>
                          
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Contactarme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Nombre completo</label>
                        <input type="text" id="txtFullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" id="txtEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPhone">Teléfono</label>
                        <input type="text" id="txtPhone" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body>
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