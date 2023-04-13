<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Prison Management System</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="{{url('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    @notifyCss
    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">

    <style>
        .wrapper {
            width: 100%;
            padding-top: 20px;
            text-align: center;
        }

        .slick-slide {
            margin: 10px;
        }

        .slick-slide img {
            width: 100%;
            margin-right: 4px;
            border: 2px solid #fff;
        }

        .wrapper .slick-dots li button:before {
            font-size: 20px;
            color: white;
        }

        .carousel {
            width: 90%;
            margin: 0px auto;
            display: flex;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->

    @include("frontend.fixed.header")


    @include('notify::components.notify')
    <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <!-- end of header -->
    <!-- end of header -->


    <!-- About-->
    @if(request()->route()->getName() == "home")
    <div id="about" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container first">
                        <h1>
                            Bangladesh prison department at a glance</h1>
                        <p>Prisons in modern civilization are institutions for reforming and educating prisoners to become members of civilized society. People can get involved in crime for a variety of reasons. Apart from punishing according to the law, it is the responsibility of the Bangladesh Prisons Department to correct and develop him. To help the misguided people in the jails of the country to understand and correct their mistakes by providing them with the right messages under the motto “Rakhib Sahbar Padhab Alo Path”</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container second">
                        <h1>Vision</h1>
                        <p>"Keep safe, show the way to light"</p>
                        <br>
                        <h1>Mission</h1>
                        <p>
                            To ensure safe custody of prisoners, to maintain strict security and order among prisoners, to treat prisoners humanely, to ensure their proper accommodation, food, medical care and access to relatives, friends and lawyers and to rehabilitate them into the society as a good citizen. Providing necessary referrals and training to the target.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-container third">
                        <h1>
                            Administrative infrastructure<h1>
                                <p>The Prison Department is one of the most important parts of the criminal justice system of the Ministry of Home Affairs. The prison department of Bangladesh consists of prison headquarters, 7 divisional prisons and 68 prisons. All the activities of the prison department are controlled and managed from the prison headquarters. The administrative activities of the prison department are conducted under the leadership of the Inspector General of Prisons with 01 Additional Inspector General of Prisons and 08 Deputy Inspector General of Prisons. Served as Jail Superintendent / Senior Jail Superintendent at Jail level.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->


    <!-- Gallery -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div id="gallary">
                    <h1 class=" text-center mb-4 pt-5" style="font-size:2.5rem">Photo Gallery</h1>

                    {{--
                    <div class="row">
                        @foreach($gallery as $data)
                        <div class="col-lg-3 col-md-12 ">
                            <img src="{{url('/frontend/gallery.picture/'.$data->image)}}" class="w-70 shadow-1-strong rounded " alt="Boat on Calm Water" />
                </div>
                @endforeach
            </div>
            --}}
            <div class="wrapper">
                <div class="carousel">
                    @foreach($gallery as $data)
                    <div class="">
                        <img src="{{url('/frontend/gallery.picture/'.$data->image)}}" class="w-70 shadow-1-strong rounded " alt="Boat on Calm Water" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="notice" class="text-center">

            <div class="row">


                <div class="col-md-12 mt-5">
                    <div class="d-flex justify-content-center">
                        <div class="card">
                            <div class="card-body " style="background:#E4FFE4">
                                <div class="w-75">
                                    <h1 class="text-left" style="font-size:large">Notice Board</h1>
                                    <blockquote class="blockquote mb-0">
                                        @foreach($not as $data)
                                        <div class="container ">
                                            <p class="w-75"><a href="{{url('/backend/pdf/'.$data->pdf)}}" alt="pdf"><i class="fa fa-arrow-right" aria-hidden="true"></i> {{$data->name}}</a></p>
                                        </div>
                                        @endforeach
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="my-4">
            <div class="bg-success w-100 text-white text-center pt-1" style="height:30px">স্বরাষ্ট্র মন্ত্রী</div>
            <div class="d-flex w-100 h-100 justify-content-center align-items-center my-3">
                <img src="{{url('frontend/slider_image/p.jpg')}}" alt="">
            </div>
            <div class="">
                <p style="font-size:small">জনাব আসাদুজ্জামান খান, এমপি</p>
                <a href="#" style="font-size:small; text-decoration:underline">বিস্তারিত</a>
            </div>
        </div>
        <div class="my-4">
            <div class="bg-success w-100 text-white text-center pt-1" style="height:30px">স্বরাষ্ট্র মন্ত্রী</div>
            <div class="d-flex w-100 h-100 justify-content-center align-items-center my-3">
                <img src="{{url('frontend/slider_image/p.jpg')}}" alt="">
            </div>
            <div class="">
                <p style="font-size:small">জনাব আসাদুজ্জামান খান, এমপি</p>
                <a href="#" style="font-size:small; text-decoration:underline">বিস্তারিত</a>
            </div>
        </div>
        <img src="{{url('frontend/gallery.picture/sticker.jpg')}}" alt="">
    </div>
    </div>

    </div>
    
    <!-- Footer -->

    @else
    @yield("content")
    @endif



    @include('frontend.fixed.footer')
    <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="{{url('frontend/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{url('frontend/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{url('frontend/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{url('frontend/js/scripts.js')}}"></script> <!-- Custom scripts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').slick({
                slidesToShow: 3,
                infinite: true,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                centerMode: true,
            });
        });
    </script>

    <script>
        // HERO SLIDER
        var menu = [];
        jQuery('.swiper-slide').each(function(index) {
            menu.push(jQuery(this).find('.slide-inner').attr("data-text"));
        });
        var interleaveOffset = 0.5;
        var swiperOptions = {
            loop: true,
            speed: 1000,
            parallax: true,
            autoplay: {
                delay: 6500,
                disableOnInteraction: false,
            },
            watchSlidesProgress: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },

                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },

                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                }
            }
        };

        var swiper = new Swiper(".swiper-container", swiperOptions);

        // DATA BACKGROUND IMAGE
        var sliderBgSetting = $(".slide-bg-image");
        sliderBgSetting.each(function(indx) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
    </script>

    @notifyJs
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
</body>

</html>