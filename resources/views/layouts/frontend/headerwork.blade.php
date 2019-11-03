<header class="header">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{route ('home')}}"><img src="{{asset('assets/img/prachee-logo.png')}}" alt="prachee"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
         <ul class="navbar-nav menu-pos">
            <li class="nav-item">
               <a style="position: absolute;left: 89%;" class="nav-link d-flex justify-content-end " href="{{route ('home')}}">home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
               <a class="nav-link d-flex justify-content-end" href="{{route ('work')}}">work</a>
               <ul class="list-group list-group-horizontal navbar-nav mydropdown worksub-pos">
                  @foreach($works as $work)
                  <li class="dropdown nav-item  @if($work->slug == request()->route('slug') ) active @endif">
                     <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false" href="{{route('all-work-single',$work->slug)}}">{{$work->title}}</a>








{{-- 
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="#">city’s residence</a>
                                      <a class="dropdown-item" href="#">nousher’s retreat</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">aftab’s residence</a>
                                    </div>    --}}






                  </li>
                  @endforeach
               </ul>
            </li>
         </ul>
      </div>
   </nav>
</header>