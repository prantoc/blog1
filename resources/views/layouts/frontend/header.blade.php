<header class="header">
   <div class="">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="{{route ('home')}}"><img src="{{asset('img/logo/'.$adms->img)}}" alt="prachee" height="36" width="205"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav menu-pos">
               <li class="nav-item mt-lg-0 mt-xl-0 mt-md-4 mt-sm-4">
                  <a class="nav-link d-flex justify-content-end work" href="{{route ('work')}}">work</a>
               </li>
               <li class="nav-item active ">
                  <a class="nav-link d-flex justify-content-end home" href="{{route ('home')}}">home <span class="sr-only">(current)</span></a>
                  <ul class="list-group list-group-horizontal navbar-nav mydropdown homesub-pos">
                     <li class="nav-item {{ request()->is('page/' . 'about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('single-page' , 'about-us')}}">about</a>
                     </li>
                     <li class="nav-item {{ request()->is('page/' . 'approach') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('single-page' , 'approach')}}">approach</a>
                     </li>
                     <li class="nav-item {{ request()->is('page/' . 'services') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('single-page' , 'services')}}">services</a>
                     </li>
                     <li class="nav-item {{ request()->is('pageimg/' . 'principal') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('single-page-img' , 'principal')}}">principal</a>
                     </li>
                     <li class="nav-item {{Request::route()->getName() == 'team-page' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('team-page')}}">team</a>
                     </li>
                     <li class="nav-item {{Request::route()->getName() == 'clients' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('clients')}}">clients</a>
                     </li>
                     <li class="nav-item {{ request()->is('pagecareer/' . 'career-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('career' , 'career-page')}}">careers</a>
                     </li>
                     <li class="nav-item {{Request::route()->getName() == 'contact' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('contact')}}">contact</a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</header>