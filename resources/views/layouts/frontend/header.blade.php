    <header class="header">
            <div class="">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{route ('home')}}"><img src="{{asset('assets/img/prachee-logo.png')}}" alt="prachee"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav menu-pos">
                            <li class="nav-item active ">
                                <a class="nav-link d-flex justify-content-end" href="{{route ('home')}}">home <span class="sr-only">(current)</span></a>

                                <ul class="list-group list-group-horizontal navbar-nav mydropdown homesub-pos">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('single-page' , 'about-us')}}">about</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('single-page' , 'approach')}}">approach</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('single-page' , 'services')}}">services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('single-page-img' , 'principal')}}">principal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('team-page')}}">team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('clients')}}">clients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('career' , 'career-page')}}">careers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('contact')}}">contact</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link d-flex justify-content-end" href="{{route ('work')}}">work</a>
                            </li>
                        </ul>
                    </div>
                </nav>
         
            </div>
     
    </header>