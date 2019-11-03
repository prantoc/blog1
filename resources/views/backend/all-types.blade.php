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
                  <th>Types</th>
                  <th class="text-center" colspan="2"> Action</th>
               </tr>
            </thead>
            <tbody>
                 @if($workfiletypes->count())
               @foreach($workfiletypes as $wft)
               <tr>
                  <th scope="row">{{$wft->id}}</th>
                  <td>{{$wft->type}}</td>
                  <td><a href="{{route($editroute,$wft->id)}}" class="btn btn-primary" style="margin-left: 26px;">Edit </a></td>
                  <td><a data-href="{{route($droute,$wft->id)}}" class="btn btn-danger cat-delete disabled" style="margin-left: 26px;"> Delete </a><br><br>

                    <span class="help-block bg-dark rounded p-1 text-white"><small>you can't delete these types</small></span>


                  </td>
               </tr>
               @endforeach
                    @else
         <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif
            </tbody>
         </table>
         {{$workfiletypes}}
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