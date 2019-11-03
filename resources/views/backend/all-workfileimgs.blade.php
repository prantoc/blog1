@extends('layouts.backend.dashboard') 
@section('backend-content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
         <h4 class="m-t-0 header-title">{{$title}}</h4>
         <table class="table table-sm mb-0 table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>File Type</th>
                  <th>File</th>
                  <th>WorkFile</th>
                  <th class="text-center" colspan="2"> Action</th>
               </tr>
            </thead>
            <tbody>
                 @if($workfileimgs->count())
               @foreach($workfileimgs as $new)
               <tr>
                  <th scope="row">{{$new->id}}</th>
                  <td>   
                    @if($new->file_type == 1)
                   <span href="{{route('all-workfiletypes')}}" class="btn btn-dark btn-rounded w-md"> Text</span>
                    @elseif($new->file_type == 2) 
                     <span href="{{route('all-workfiletypes')}}" class="btn btn-info btn-rounded w-md"> Image</span>
                    @elseif($new->file_type == 3)
                     <span href="{{route('all-workfiletypes')}}" class="btn btn-success btn-rounded w-md"> Video</span>
                    @endif 

                  </td>
                  <td>
                     @if($new->file_type == 1)
                      

                      {!! $new->details !!}
                          

                      @elseif($new->file_type == 2) 

                      @if($new->file)
                       <img src="{{asset('workfile/img/'.$new->file)}}" alt="{{$new->file}}" style="max-height: 75px;">
                       @else
                       <img src="{{asset('assets/img/noimage.jpg')}}" alt="$new->name" style="max-height: 75px;">
                       @endif

                       @elseif($new->file_type == 3) 
                       <video width="220" height="140" controls>
                            <source src="{{asset('workfile/video/'.$new->file)}}" type="video/mp4">
                        </video>

                         @endif
                  </td>
                  <td>{{$new->workfile->title}} [ {{$new->workfile->id}} ]</td>
                  <td><a href="{{route($editroute,$new->id)}}" class="btn btn-primary" style="margin-left: 26px;">Edit </a></td>
                  <td><a data-href="{{route($droute,$new->id)}}" class="btn btn-danger cat-delete" style="margin-left: 26px;"> Delete </a></td>
               </tr>
               @endforeach
                    @else
         <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif
            </tbody>
         </table>
         {{$workfileimgs}}
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