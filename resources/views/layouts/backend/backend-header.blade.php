       <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <header id="topnav">
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                     
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/img/Prachee-Thumb.png')}}" alt="user" class="rounded-circle"> <span class="ml-1">Welcome  !    <span style="color: #F7941E;">{{ Auth::user()->name }} </span> <i class="mdi mdi-chevron-down"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">If you want to logout this admin dashboard !</h6>
                                </div>
    
                               
                                  <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="dripicons-power"></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    
                            </div>
                        </li>
                   
                    </ul>
    
                    <ul class="list-unstyled menu-left mb-0">
                        <li class="float-left">
                            <a href="{{route('dashboardHome')}}" class="logo">
                                <span class="logo-lg">
                                    <img src="{{asset('assets/img/prachee-logo.png')}}" alt="" height="20">
                                </span>
                                <span class="logo-sm">
                                    <img src="{{asset('assets/img/Prachee-Thumb.png')}}" alt="" height="28">
                                </span>
                            </a>
                        </li>
                        <li class="float-left">
                            <a class="button-menu-mobile open-left navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li class="app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit" class="sr-only"></button>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- end navbar-custom -->
            </header>
            <!-- End Navigation Bar-->