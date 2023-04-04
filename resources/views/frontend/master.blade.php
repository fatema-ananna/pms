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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="{{url('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/styles.css')}}" rel="stylesheet">
    @notifyCss
    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
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


    <!-- Services -->

    <h1 class=" text-center display-4">Photo Gallery</h1>
    <br>
  


    <div class="row">
        @foreach($gallery as $data)
        <div class="col-lg-3 col-md-12 ">

            <img src="{{url('/frontend/gallery.picture/'.$data->image)}}" class="w-70 shadow-1-strong rounded " alt="Boat on Calm Water" />

        </div>

        @endforeach



    </div>



   

<div class="text-center">
   
    <h1>Notice</h1>
    <div class="row">
   
@foreach($not as $data)
    <div class="container mt-5">
    

        <p><a href="{{url('/backend/pdf/'.$data->pdf)}}" alt="pdf">{{$data->name}}</p>

    </div>
@endforeach
    </div>
    </div>


    <!-- Projects -->
    <div id="projects" class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of projects -->


    <!-- Works -->
    <div class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">

                        </div> <!-- end of image-container -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of works -->


    <!-- Testimonials -->
    <!-- end of cards-1 -->
    <!-- end of testimonials -->


    <!-- Section Divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr class="section-divider">
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <!-- end of section divider -->


    <!-- Questions -->
    <div class="accordion-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Frequent questions</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How can I contact you and quickly get a quote for my online project?
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach me is through the contact form of by messaging me on my social media accounts. For a fast quote make sure your provide many project details
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Do you create designs from the ground up or you are using themes?
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach me is through the contact form of by messaging me on my social media accounts. For a fast quote make sure your provide many project details
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Will I receive any included maintenance or warranty after project delivery?
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach me is through the contact form of by messaging me on my social media accounts. For a fast quote make sure your provide many project details
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    If something goes wrong with the project can I have my money back?
                                </button>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach me is through the contact form of by messaging me on my social media accounts. For a fast quote make sure your provide many project details
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What's your preferred method of payment and do you need an advance?
                                </button>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach me is through the contact form of by messaging me on my social media accounts. For a fast quote make sure your provide many project details
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of accordion -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of accordion-1 -->



    <!-- Contact -->
    <div id="contact" class="form-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact details</h2>
                    <p class="p-heading">For any type of online project please don't hesitate to get in touch with me. The fastest way is to send me your message using the following email <a class="blue no-line" href="#your-link">contact@domain.com</a></p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Contact Form -->
                    <form id="contactForm">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Email</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Project details</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">Submit</button>
                        </div>k
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->


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
    @notifyJs
</body>

</html>