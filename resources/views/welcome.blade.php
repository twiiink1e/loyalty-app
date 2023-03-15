<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/jpg" />

    <title>Loyalty App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">

    {{-- Bootstrap Link --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Script  --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="antialiased">
    <!-- Navbar start -->
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <!-- Logo Placeholder for Inlustration -->
                <a href="/"><img src="{{ asset('assets/images/logo2.png') }}" alt=""></a>
            </div>

            <ul id="" class="menu">
                @php
                    $currentRouteName = request()
                        ->route()
                        ->getName();
                @endphp

                <li><a href="{{ asset('/') }}"
                        class="{{ $currentRouteName === 'welcome' ? 'active' : '' }} six">Home</a></li>
                <li><a href="{{ asset('#') }}"
                        class="{{ $currentRouteName === 'reward' ? 'active' : '' }} one">Reward</a></li>
                <li><a href="{{ asset('/contact') }}"
                        class="{{ $currentRouteName === 'contact' ? 'active' : '' }} one">Contact Us</a></li>
                <li>
                    <a class="login-but" href="/login">Log In</a>
                    <a class="" href="/register">Register</a>
                </li>
            </ul>
            <!-- Navbar Links -->
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="page-wrapper">
        <div class="ads_browse">
            {{-- <div class="loader" style="margin-top: 0px ">
                <div class="loader-content">
                    <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
                </div>
            </div> --}}
            <div class="ads_text">

                <h1>Customer Loyalty</h1>
                <h1 style="margin-top: 0px">Program</h1>
                <p style="font-size: 25px; margin-top: 20px">Look up for your loyalty point to redeem available</p>
                <p style="font-size: 25px; margin-top: -20px">reward in our store.</p>

                <a href="#">
                    <button>Get started</button>
                </a>

            </div>

            <img class="bg_img" src="{{ asset('assets/images/new_bg.png') }}" alt="">

        </div>

        <div class="below_ads">
            <div class="d-flex justify-content-center">
                <div class="below_txt">
                    <h2>Loyaltee is here to help you gain.</h2>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="below_txt">
                    <h3>Get reward by exchanging your loyalty point.</h3>
                </div>
            </div>
        </div>

        <div class="container" style="padding-top: 100px">
            <div class="blank"></div>
            <div class="row justify-content-center">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="cardhome">
                                <a class="img-card" href="#">
                                    <img
                                        src="https://www.ppcbank.com.kh/wp-content/uploads/2021/03/ppcbank-pizza-visa-promo-en.jpg" />
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="#">The Pizza Company</a>
                                    </h4>
                                    <p class="">
                                        Enjoy the limitless style of Parisian design. A major player since bursting onto the fashion scene in 1933.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="cardhome">
                                <a class="img-card" href="#">
                                    <img src="https://www.cafe-amazon.com/BackEnd/TempPromotion/f46a16655be0434db320d8aadcca497b.jpg" />
                                    
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="#">Amazon Cafe</a>
                                    </h4>
                                    <p class="">
                                        Enjoy the limitless style of Parisian design. A major player since bursting onto the fashion scene in 1933.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="cardhome">
                                <a class="img-card" href="#">
                                    <img
                                        src="https://sg.everydayonsales.com/wp-content/uploads/2020/08/Adidas-Opening-Sale-at-Shopee.jpg"/>
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="#">Adidas</a>
                                    </h4>
                                    <p class="">
                                        Enjoy the limitless style of Parisian design. A major player since bursting onto the fashion scene in 1933.
                                    </p>
                                </div>
                                <div class="card-read-more">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding-bottom: 100px">
            <div class="blank"></div>
            <div class="row justify-content-center">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="cardhome">
                                <a class="img-card" href="#">
                                    <img
                                        src="https://www.ppcbank.com.kh/wp-content/uploads/2021/03/ppcbank-pizza-visa-promo-en.jpg" />
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="#">The Pizza Compnay</a>
                                    </h4>
                                    <p class="">
                                        Enjoy the limitless style of Parisian design. A major player since bursting onto the fashion scene in 1933.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="cardhome">
                                <a class="img-card" href="#">
                                    <img src="https://www.cafe-amazon.com/BackEnd/TempPromotion/f46a16655be0434db320d8aadcca497b.jpg" />
                                    
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="#">Amazon Cafe</a>
                                    </h4>
                                    <p class="">
                                        Enjoy the limitless style of Parisian design. A major player since bursting onto the fashion scene in 1933.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="cardhome">
                                <a class="img-card" href="#">
                                    <img
                                        src="https://sg.everydayonsales.com/wp-content/uploads/2020/08/Adidas-Opening-Sale-at-Shopee.jpg"/>
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="#">Adidas</a>
                                    </h4>
                                    <p class="">
                                        Enjoy the limitless style of Parisian design. A major player since bursting onto the fashion scene in 1933.
                                    </p>
                                </div>
                                <div class="card-read-more">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


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
                    <p class="mb-0" style="font-size: 14px"><i class='bx bx-map'></i>#123, St 123, Toul Tompong, Phnom
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
                        <li><a href="#">Reward</a></li>
                        <li><a href="#">Privacy & Policy</a></li>
                        <li><a href="#">Admin</a></li>
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


    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 0) {
                $("#navbar").addClass("active");
            } else {
                $("#navbar").removeClass("active");
            }
        });
    </script>



</body>

</html>
