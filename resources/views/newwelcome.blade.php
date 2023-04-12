<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Loyalty App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/jpg" />

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Bootstrap css-->
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Materialdesign icon-->
    <link rel="stylesheet" href="assets/front/css/materialdesignicons.min.css" type="text/css" />

    <!-- Swiper Slider css -->
    <link rel="stylesheet" href="assets/front/css/swiper-bundle.min.css" type="text/css" />

    <!-- Custom Css -->
    <link href="assets/front/css/style.min.css" rel="stylesheet" type="text/css" />

    <!-- colors -->
    <link href="assets/front/css/colors/default.css" rel="stylesheet" type="text/css" id="color-opt" />

    <link href="{{ asset('assets/front/home.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/corousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/corousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/corousel/css/style.css') }}">


</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-navlist" data-bs-offset="60">

    <!--start page Loader -->
    <div id="preloader">
        <div id="status">
            <div class="load">
                <hr />
                <hr />
                <hr />
                <hr />
            </div>
        </div>
    </div>
    <!--end page Loader -->

    <!-- START NAVBAR -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top sticky">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="assets/front/images/logo2.png" alt=""
                    height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-navlist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/announcements">Announcement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#faq">Faq</a>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="/login"><i
                                        class="mdi mdi-arrow-right-bold-circle-outline"></i>Sign in</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href=" {{ route('pointfront.index') }}"><i class='bx bx-award'></i>&emsp;Profile Point</a>

                                <a class="dropdown-item" href="{{ route('histories.index') }}"><i class='bx bx-list-check'></i>&emsp; History</a>

                                <a class="dropdown-item" href="{{ route('user-change-password') }}"><i class='bx bx-edit'></i>&emsp;Change Password</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out'></i>&emsp; {{ __(' Log Out') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest
                </ul>
                <!--end navbar-nav-->
            </div>
            <!--end collapse-->
        </div>
        <!--end container-->
    </nav>
    <!-- END NAVBAR -->

    <!-- START HOME -->
    <section class="bg-home4 overflow-hidden" id="home">
        <div class="container">
            <div class="position-relative" style="z-index: 1;">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div>
                            <h1>Customer Loyalty Program
                            </h1>
                            <p class="text-black-50 fs-18 pt-4">This system is a very user friendly system to handle
                                our needs for our clients and the Rewards Program that we offer to our clients.</p>
                            {{-- <p class="text-black-50 fs-17 pt-4">Look up for your loyalty point to redeem available reward in our store.</p> --}}
                            <div class="text-center subscribe-form mt-5">
                                <form action="{{ route('announcements.search') }}" method="get">
                                    <input type="text" class="control-form" id="inputemail"
                                    placeholder="Find your favorite store" name="inputSearch">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 offset-xl-1">
                        <div class="mt-lg-0 mt-5">
                            <img src="assets/front/images/new_bg.png" alt="home04" class="home-img"
                                style="width: 150%">
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <!--end container-->
    </section>

    <div class="position-relative">
        <div class="shape overflow-hidden text-white position-absolute">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                style="width: 100%;" height="250" preserveAspectRatio="none" viewBox="0 0 1440 250">
                <g mask="url(&quot;#SvgjsMask1006&quot;)" fill="none">
                    <path d="M 0,246 C 288,210 1152,102 1440,66L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
                </g>
                <defs>
                    <mask id="SvgjsMask1006">
                        <rect width="1440" height="250" fill="#ffffff"></rect>
                    </mask>
                </defs>
            </svg>
        </div>
    </div>
    <!-- END HOME -->

    <!-- START FEATURES -->
    <section class="section" id="announcement">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h3>Loyaltee is here to help you gain.</h3>
                        <p class="text-muted">Get reward by exchanging your loyalty point.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                {{-- <div class="container">
                    <div class="blank"></div>
                    <div class="row justify-content-center">
                        <div class="content">
                            <div class="row">
                                @foreach ($announcements as $announcement)
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="cardhome">
                                            <a class="img-card" href="{{ route('frontannouncements.show', $announcement->id)}}">
                                                <img src="/thumbnails/{{ $announcement->thumbnail }}">
                                            </a>
                                            <div class="card-content">

                                                <h4 class="card-title">
                                                    <a href="#">{{ $announcement->topic }}</a>
                                                </h4>
                                                <p>
                                                    {{ $announcement->description }}
                                                </p>
                                                <p>
                                                    {{ $announcement->company->name }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="container" style="margin-top: 50px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="featured-carousel owl-carousel">
                            @foreach ($announcements as $announcement)
                                <div class="item">
                                    <div class="blog-entry">
                                        <a href="#" class="block-20 d-flex align-items-start" style="background-image: url('/thumbnails/{{ $announcement->thumbnail }}');">
                                            <div class="meta-date text-center p-2">
                                                <span class="mos">Ends in</span>
                                                <span class="day">{{\Carbon\Carbon::now()->diffInDays($announcement->expire) + 1}}</span>
                                                <span class="yr">Days</span>
                                            </div>
                                        </a>
                                        <div class="text border border-top-0 p-4">
                                            <p class="meta2 mt-1 mb-1">
                                                <a href="#" class="mr-2">{{ $announcement->company->name }}</a>
                                            </p>
                                            <h3 class="heading"><a href="#">{{ $announcement->topic }}</a></h3>
                                            <div class="desc">
                                                <p>{{ $announcement->description }}</p>
                                            </div>
                                            <div class="d-flex align-items-center mt-4">
                                                <h4 class="mb-0"><a href="{{ route('frontannouncements.show', $announcement->id)}}" class="btn btn-primary">Read More &nbsp; <span class="ion-ios-arrow-round-forward"></span></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END FEATURES -->


    <!-- START FAQ -->
    <section class="section" id="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5 pb-2">
                        <h3>How can we Help you?</h3>
                        <p class="text-muted mt-2">It is a long established fact that a reader will be of a page when
                            established fact looking at its layout.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4 pb-2">
                        <div class="faq d-flex">
                            <div class="icon flex-shrink-0 me-3">
                                ?
                            </div>
                            <div class="content">
                                <h5 class="fs-17">Design Your FAQ Page?</h5>
                                <p class="text-muted mb-0">If your FAQ page does consist of multiple pages, then one
                                    critical element you'll need to consider is your navigation bar. If your search bar
                                    is tricky to use or doesn't yield desired results, customers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 pb-2">
                        <div class="faq d-flex">
                            <div class="icon flex-shrink-0 me-3">
                                ?
                            </div>
                            <div class="content">
                                <h5 class="fs-17">Monitor the FAQ Page's Performance?</h5>
                                <p class="text-muted mb-0">In this detailed guide, we’re going to dive deep into the
                                    whole concept of FAQs. To discover their main purpose and to find out how it can
                                    help generate more sales and leads for your business.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 pb-2">
                        <div class="faq d-flex">
                            <div class="icon flex-shrink-0 me-3">
                                ?
                            </div>
                            <div class="content">
                                <h5 class="fs-17">Why you should make an FAQ page?</h5>
                                <p class="text-muted mb-0">Every business and product website comes with a set of
                                    default pages like an “About” page, “Contact” page, “Privacy Policy” page, and more.
                                    A FAQ page is one of the few must-have pages on this list.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-6">
                    <div class="mb-4 pb-4">
                        <div class="faq d-flex">
                            <div class="icon flex-shrink-0 me-3">
                                ?
                            </div>
                            <div class="content">
                                <h5 class="fs-17"> Regularly update each page?</h5>
                                <p class="text-muted mb-0"> Most online support teams spend hours of their valuable
                                    time every day answering these general questions. While it could’ve been easily
                                    avoided by placing a FAQs section on the website.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END FAQ -->


    <!--start contact-->
    {{-- <section class="section bg-light" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h3>Contact Us</h3>
                        <p class="text-muted mt-2">Feel free to send us any suggestion or questions.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-details mb-4 mb-lg-0">
                        <p class="mb-3"><i class="mdi mdi-email-outline align-middle text-muted fs-20 me-2"></i> <span class="fw-medium">support@loyaltee.com</span></p>
                        <p class="mb-3"><i class="mdi mdi-web align-middle text-muted fs-20 me-2"></i> <span class="fw-medium">www.loyaltee.com</span></p>
                        <p class="mb-3"><i class="mdi mdi-phone align-middle text-muted fs-20 me-2"></i> <span class="fw-medium">+855 123 456</span></p>
                        <p class="mb-3"><i class="mdi mdi-hospital-building text-muted fs-20 me-2"></i> <span class="fw-medium">9:00 AM - 6:00 PM</span></p>
                        <p class="mb-3"><i class="mdi mdi-map-marker-outline text-muted fs-20 me-2"></i> <span class="fw-medium">#123, St123, Toul Tompong, Phnom Penh</span></p>
                    </div>
                    <!--end contact-details-->
                </div>
                <!--end col-->
                <div class="col-lg-7">
                    <form method="post" onsubmit="return validateForm()" class="contact-form" name="myForm" id="myForm">
                        <span id="error-msg"></span>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter your name*">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text"><i class="mdi mdi-file-document-outline"></i></span>
                                    <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text align-items-start"><i class="mdi mdi-comment-text-outline"></i></span>
                                    <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter your message*"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-end">
                                <input type="submit" id="submit" name="send" class="btn btn-primary" value="Send Message">
                            </div>
                        </div>
                    </form>
                    <!--end form-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section> --}}
    <!--end contact-->


    <!--start back-to-top-->
    <button onclick="topFunction()" id="back-to-top">
        <i class='bx bxs-up-arrow-alt'></i>
    </button>
    <!--end back-to-top-->


    <!-- footer start -->
    <div class="mt-0 pt-5 pb-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <h2 style="font-size: 20px">LOYALTEE</h2>
                    <p class="pr-5 text-white-50" style="font-size: 14px">A website where you can view and track your
                        customer </p>
                    <p class="pr-5 text-white-50" style="font-size: 14px">loyalty point to exchange for reward.</p>
                    <p>
                        <a href="#"><i class='bx bxl-facebook' style='color:#fff; font-size:30px'></i></a>
                        <a href="#"><i class='bx bxl-telegram' style='color:#fff; font-size:30px'></i></a>
                        <a href="#"><i class='bx bxl-gmail' style='color:#fff; font-size:30px'></i></a>
                    </p>
                </div>

                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4" style="font-size: 20px">Location</h4>
                    <p class="mb-0" style="font-size: 14px"><i class='bx bx-map'></i>#123, St 123, Toul Tompong,
                        Phnom
                        Penh</p>
                    <br />
                    <p class="mb-0" style="font-size: 14px"><i class='bx bxs-phone-call'></i>(+855) 12-123-456</p>
                    <br />
                    <p style="font-size: 14px"><i class='bx bx-envelope'></i>loyaltee@gmail.com</p>
                </div>

                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3" style="font-size: 20px">Links</h4>
                    <ul class="m-0 p-0">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Announcement</a></li>
                        <li><a href="#">Privacy & Policy</a></li>
                        <li><a href="{{ route('admin.home') }}">Admin</a></li>
                    </ul>

                </div>

            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© 2022. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->


    <!-- Bootstrap Bundale js -->
    <script src="assets/front/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper Slider js -->
    <script src="assets/front/js/swiper-bundle.min.js"></script>

    <!-- Contact Js -->
    <script src="assets/front/js/contact.js"></script>

    <!-- Index-init Js -->
    <script src="assets/front/js/index.init.js"></script>

    <!-- App js -->
    <script src="assets/front/js/app.js"></script>

    <script src="{{ asset('assets/corousel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/corousel/js/popper.js') }}"></script>
    <script src="{{ asset('assets/corousel/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/corousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/corousel/js/main.j') }}s"></script>

    <script>
        $('.desc p').text(function(_, txt) {
            if (txt.length > 110) {
                txt = txt.substr(0, 110) + "...";
                $(this).parent().append("");
            }
            $(this).html(txt)
        });
    </script>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

</body>

</html>
