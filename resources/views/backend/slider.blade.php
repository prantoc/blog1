@extends('layouts.backend.dashboard')  
@section('backend-content')
<!-- Form row -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Slider</h4>
            {{-- <p class="text-muted m-b-30 font-13">
                You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
            </p> --}}

            <form method="POST" action="{{ route($route) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Slider Image (max:5MB)</label>
                        <input type="file" class="form-control" name="img" value="{{ old('img') }}">
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label class="col-form-label">Scan/Photo of Member's Signature </label>
                        
                        <input type="file" class="form-control" name="sign" value="{{ old('sign') }}">
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-primary">Add Slider</button>
            </form>
        </div> <!-- end card-box -->
    </div> <!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">{{$title}}</h4>
           {{--  <p class="text-muted font-13 m-b-20">
                Add for borders on all sides of the table and cells.
            </p> --}}

            <table class="table table-bordered mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($sliders as $slider)
                    <form method="POST" action="{{ route($eroute,$slider->id) }}" enctype="multipart/form-data">
                @csrf

                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>
                        <img src="{{asset('img/slider/'.$slider->img)}}" alt="Image" style="max-width:500px; max-height: 230px;">
                        <label class="col-form-label">Change Image (max:5MB):</label>
                        <input type="file" class="form-control" name="img" value="{{ old('img') }}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="position" value="{{$slider->position}}">
                    </td>
                    <td>
                        <button type="submit" class=" btn btn-primary mb-5">Update</button> 
                        <a data-href="{{ route($droute,$slider->id) }}" class="cat-delete btn btn-danger" style="color: #fff;"> Delete</a>
                    </td>
                </tr>

                </form>

                @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end card-box -->
    </div> <!-- end col -->

</div>    
<!-- end row -->    

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

