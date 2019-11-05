<header class="header">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{route ('home')}}"><img src="{{asset('assets/img/prachee-logo.png')}}" alt="prachee"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
         <ul class="navbar-nav menu-pos">
            <li class="nav-item">
               <a style="position: absolute;left: 89%;" class="nav-link " href="{{route ('home')}}">home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
               <a class="nav-link d-flex justify-content-end" href="{{route ('work')}}">work</a>
               <ul class="list-group list-group-horizontal navbar-nav mydropdown worksub-pos">
                  @foreach($works as $work)
           

                        <li class="nav-item nav-item dropdown @if($work->slug == request()->route('slug') ) active @endif">
                                    <a class="nav-link dropdown-toggle" href="{{route('all-work-single',$work->slug)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$work->title}}</a>

                                    @if(!$work->workfiles->isEmpty())
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       @forelse($work->workfiles as $wf)
                                      <a class="dropdown-item @if($wf->workfile->slug == request()->route('slug') ) active @endif" href="{{route('work-img-page',$wf->workfile->slug)}}">{{$wf->workfile->title}}</a>
                                       @empty
                                     @endforelse
                                    </div>  

                          @endif 
                                </li>
                  @endforeach
               </ul>
            </li>
         </ul>






      </div>
   </nav>
</header>