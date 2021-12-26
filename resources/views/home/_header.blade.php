<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{route('home')}}">Jobless</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
                <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
                    @php
                        $parentCategories = \App\Http\Controllers\HomeController::categorylist()
                    @endphp
                    @include('home._category',['parentCategories' => $parentCategories])
                </li>
                <li><a class="nav-link scrollto" href="{{route('about')}}">About</a></li>
                <li><a class="nav-link scrollto" href="{{route('ref')}}">References</a></li>
                <li><a class="nav-link  scrollto" href="{{route('faq')}}">FAQ</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                {{--  nav account --}}
                <li class="dropdown"><a href="#"><span>Account</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @auth
                            <li><a class="nav-link" href="{{route('myprofile')}}"><span><i
                                            class="fa fa-user-o pr-1"></i>{{Auth::user()->name}}</span></a></li>
                            <li>
                                <a class="nav-link text-primary" href="{{route('mycomments')}}"><span>Comments</span></a>
                            </li>

                            <li>
                                <a class="nav-link text-primary " href="{{route('user_jobs')}}"><span> Jobs</span></a>
                            </li>

                            <li>
                                <a class="nav-link text-primary " href="{{route('mycomments')}}"><span>CV</span></a>
                            </li>

                            <li><a class="nav-link " href="{{route('logout')}}"><span>Logout</span></a></li>
                        @endauth
                        @guest
                            <li><a class="nav-link scrollto text-center text-primary" href="/login">Login</a></li>
                            <li><a class="nav-link scrollto text-center text-primary" href="/register">Register</a></li>
                        @endguest

                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{route('contact')}}">Contact</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

