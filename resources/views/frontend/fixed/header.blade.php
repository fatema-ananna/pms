<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">

        <!-- Image Logo -->
        <!-- <a class="navbar-brand logo-image"><img src="{{url('frontend/slider/logo).jpg')}}" height="50px" width="auto" alt="alternative"></a> -->

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Mark</a> -->

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#gallary">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#notice">Notice</a>
                </li>
                @if(!auth("frontendAuth")->user())
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('frontend.login')}}">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('user.registration')}}">Registration</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth("frontendAuth")->user()->first_name}} {{auth("frontendAuth")->user()->last_name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('frontend.visitor')}}">Profile</a></li>
                        <hr />
                        <li><a class="dropdown-item" href="{{route('frontend.logout')}}">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">

                </span>
                <span class="fa-stack">

                </span>
            </span>
        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav>

@if(request()->route()->getName() == "home")

{{--
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <!--                   
                        <a class="btn-solid-lg page-scroll" href="#about">Discover</a>
                         <a class="btn-outline-lg page-scroll" href="#contact"><i class="fas fa-user"></i>Contact Me</a>  -->
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header>
--}}

<section class="hero-slider hero-style" style="margin-top:70px">
        <div class="swiper-container">
            <div class="swiper-wrapper">
            @for($i = 5; $i > 0; $i-- )
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background='{{url("frontend/slider_image/$i.jpg")}}'>
                        <div class="container">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2>keep you safe, show you the way of light</h2>
                            </div>
                        </div>
                    </div>
                    <!-- end slide-inner -->
                </div>
            @endfor
                <!-- end swiper-slide -->
                <!-- end swiper-slide -->
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
@endif