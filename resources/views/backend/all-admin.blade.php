@extends('layouts.backend.dashboard')  
@section('backend-content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
         <h4 class="m-t-0 header-title">{{$title}}</h4>
         <table class="table table-bordered mb-0">
            <thead>
               <tr class="text-center">
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Reg. Date</th>
                  <th class="text-center" colspan="2"> Action</th>
               </tr>
            </thead>
            <tbody>
               @if($admins->count())
               @foreach($admins as $admin)
               <tr class="text-center">
                  <th scope="row">{{$admin->id}}</th>
                  <td>{{$admin->name}}</td>
                  <td>{{str_limit($admin->email ,5)}}</td>
                  <td>{{$admin->name}}</td>
                  <td>{{$admin->created_at}}</td>
                  <td><a href="{{route($eroute,$admin->id)}}" class="btn btn-primary" style="margin-left: 26px;">Edit </a></td>
                @if($admin->id == 4)
                  <td>
                    
                    <small class="help-block bg-dark rounded py-2 text-white"> you can't delete these Admin ! </small>
                  </td>
                @else
                  <td><a data-href="{{route($droute,$admin->id)}}" class="btn btn-danger cat-delete text-white" style="margin-left: 26px;"> Delete </a></td>
                @endif
               </tr>
               @endforeach
                    @else
         <span class="btn btn-dark w-md px-5 mt-2 mb-2  d-flex justify-content-center text-white text-blod"><small>No data available !</small></span>
         @endif
            </tbody>
         </table>
         {{ $admins }}
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
                 text: "If you delete this admin then all of the data which added this admin is deleted & You won't be able to revert this!",
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

</script>
@endsection