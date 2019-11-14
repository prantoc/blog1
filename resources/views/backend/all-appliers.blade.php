@extends('layouts.backend.dashboard') 
@section('backend-content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
        @if($news->count())
          <a data-href="{{route($dallroute)}}" class="btn btn-warning cat-delete text-blod float-right mb-2" style="margin-left: 26px;"> If you want to delete  {{$title}} </a>
        @else
        @endif
         <h4 class="m-t-0 header-title">{{$title}}</h4>
         <table class="table table-sm mb-0 table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>CV</th>
                  <th>Protfolio</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th class="text-center" colspan="2"> Action</th>
               </tr>
            </thead>
            <tbody>
               @if($news->count())
               @foreach($news as $new)
               <tr>
                  <th scope="row">{{$new->id}}</th>
                  <td>{{$new->name}}</td>
                  <td>{{$new->email}}</td>
                  <td>
                    @php
                    $filepath = 'uploaded_cv/';
                    $hasfile = 0;
                    if(File::exists($filepath)){
                      if($new->up_cv){
                        $filetype = mime_content_type($filepath.$new->up_cv);
                        $filesize = filesize($filepath.$new->up_cv);
                        $filesize = round($filesize / 1024, 2);
                      }
                      $hasfile = 1;
                    }
                    @endphp

                    @if ( $hasfile && $new->up_cv && mime_content_type($filepath.$new->up_cv) == 'application/pdf')
                      <div class="mailbox-attachment-info">
                        <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_cv }}" class="mailbox-attachment-name"><i class="far fa-file-pdf" style="font-size: 19px;"></i> {!! str_limit($new->up_cv,6) !!}</a>
                            <span class="mailbox-attachment-size">
                              {{ $filesize }} KB
                              <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_cv }}" class="btn btn-primary btn-sm float-right" style="word-break: break-all;"><i class="fas fa-cloud-download-alt" style="font-size: 19px;"></i></a>
                            </span>
                      </div>
                    @elseif( $hasfile && $new->up_cv && ($filetype == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $filetype == 'application/msword'))
                      <div class="mailbox-attachment-info">
                        <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_cv }}" class="mailbox-attachment-name" style="word-break: break-all;"> <i class="far fa-file-word" style="font-size: 19px;"></i>{!! str_limit($new->up_cv,6) !!}</a>
                            <span class="mailbox-attachment-size">
                              {{ $filesize }} KB
                              <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_cv }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-cloud-download-alt" style="font-size: 19px;"></i></a>
                            </span>
                      </div>
                    @endif
                  </td>
                  <td>
                    @php
                    $filepath = 'uploaded_cv/';
                    $hasfile = 0;
                    if(File::exists($filepath)){
                      if($new->up_protfolio){
                        $filetype = mime_content_type($filepath.$new->up_protfolio);
                        $filesize = filesize($filepath.$new->up_protfolio);
                        $filesize = round($filesize / 1024, 2);
                      }
                      $hasfile = 1;
                    }
                    @endphp

                    @if ( $hasfile && $new->up_protfolio && mime_content_type($filepath.$new->up_protfolio) == 'application/pdf')
                      <div class="mailbox-attachment-info">
                        <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_protfolio }}" class="mailbox-attachment-name"><i class="far fa-file-pdf" style="font-size: 19px;"></i> {!! str_limit($new->up_protfolio,6) !!}</a>
                            <span class="mailbox-attachment-size">
                              {{ $filesize }} KB
                              <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_protfolio }}" class="btn btn-primary btn-sm float-right" style="word-break: break-all;"><i class="fas fa-cloud-download-alt" style="font-size: 19px;"></i></a>
                            </span>
                      </div>
                    @elseif( $hasfile && $new->up_protfolio && ($filetype == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $filetype == 'application/msword'))
                      <div class="mailbox-attachment-info">
                        <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_protfolio }}" class="mailbox-attachment-name" style="word-break: break-all;"> <i class="far fa-file-word" style="font-size: 19px;"></i>{!! str_limit($new->up_protfolio,6) !!}</a>
                            <span class="mailbox-attachment-size">
                              {{ $filesize }} KB
                              <a href="{{ route('home') }}/{{ $filepath }}{{ $new->up_protfolio }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-cloud-download-alt" style="font-size: 19px;"></i></a>
                            </span>
                      </div>
                    @endif
                  </td>
                  <td>{!! str_limit($new->subject,6) !!}</td>
                  <td>{!! str_limit($new->mgs,6) !!}</td>
                  <td><a href="{{route($vroute,$new->id)}}" class="btn btn-info text-white" style="margin-left: 26px;"> View </a></td>
                  <td><a data-href="{{route($droute,$new->id)}}" class="btn btn-danger cat-delete" style="margin-left: 26px;"> Delete </a></td>
               </tr>
               @endforeach
                    @else
         <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif
            </tbody>
         </table>
         {{ $news }}
      </div>
      <!-- end card-box -->
   </div>
   <!-- end col -->
</div>
@endsection
@section('scripts')
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
                     timer: 5000,
                     onOpen: () => {
                       swal.showLoading()
                       timerInterval = setInterval(() => {
                         swal.getContent().querySelector('strong')
                           .textContent = swal.getTimerLeft()
                       }, 200)
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
</script>
@endsection