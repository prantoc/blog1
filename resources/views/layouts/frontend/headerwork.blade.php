

        <header class="header">
            
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{route ('home')}}"><img src="{{asset('assets/img/prachee-logo.png')}}" alt="prachee"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav menu-pos">
                            <li class="nav-item active ">
                                <a style="position: fixed;left: 92%;" class="nav-link d-flex justify-content-end " href="{{route ('home')}}">home <span class="sr-only">(current)</span></a>

                               
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link d-flex justify-content-end" href="{{route ('work')}}">work</a>

                                    <ul class="list-group list-group-horizontal navbar-nav mydropdown worksub-pos">
                                @foreach($works as $work)
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{$work->title}}</a>
                                </li>
                            @endforeach
                            </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
         
         
     
    </header>



