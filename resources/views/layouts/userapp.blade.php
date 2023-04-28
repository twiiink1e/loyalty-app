<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Loyalty App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/jpg" />

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Bootstrap css-->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Materialdesign icon-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/materialdesignicons.min.css') }}" type="text/css" />

    <!-- Swiper Slider css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/swiper-bundle.min.css') }}" type="text/css" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/front/css/style.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- colors -->
    <link href="{{ asset('assets/front/css/colors/default.css') }}" rel="stylesheet" type="text/css" id="color-opt" />


    <link href="{{ asset('assets/front/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/table.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/announcement.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/point.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
            <a class="navbar-brand" href="/"><img src="{{ asset('assets/front/images/logo2.png') }}"
                    alt="" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-navlist">
                    @php
                        $currentRouteName = request()
                            ->route()
                            ->getName();
                    @endphp

                    <li class="nav-item">
                        <a href="{{ asset('/') }}"
                            class="nav-link {{ $currentRouteName === 'welcome' ? 'active' : '' }} six">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('/announcements') }}"
                            class="nav-link {{ $currentRouteName === 'frontannouncements.index' ? 'active' : '' }} one">Announcement</a>
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

                                <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}"><i class='bx bx-edit-alt'></i>&emsp;Edit Profile</a>

                                <a class="dropdown-item" href=" {{ route('pointfront.index') }}"><i
                                        class='bx bx-award'></i>&emsp;Profile Point</a>

                                <a class="dropdown-item" href="{{ route('histories.index') }}"><i
                                        class='bx bx-list-check'></i>&emsp; History</a>

                                <a class="dropdown-item" href="{{ route('user-change-password') }}"><i class='bx bx-lock'></i>&emsp;Change Password</a>

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
                <!-- <ul class="list-inline mb-0 ps-lg-4 ms-2">
                    <li class="list-inline-item">
                        <a href="#" class="primary-link"><i class="mdi mdi-arrow-right-bold-circle-outline"></i></a>
                    </li>
                </ul> -->
            </div>
            <!--end collapse-->
        </div>
        <!--end container-->
    </nav>
    <!-- END NAVBAR -->

    <!-- START HOME -->


    <div class="container" style="50px">
        <div class="position-relative" style="z-index: 1;">
            @yield('content')
        </div>
    </div>

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
                        <li><a href="#">Reward</a></li>
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

    {{-- nav bar active --}}
    <script>
        $(document).ready(function() {

            $(".one").click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            });
        });
    </script>

    <!-- Bootstrap Bundale js -->
    <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Swiper Slider js -->
    <script src="{{ asset('assets/front/js/swiper-bundle.min.js') }}"></script>

    <!-- Contact Js -->
    <script src="{{ asset('assets/front/js/contact.js') }}"></script>

    <!-- Index-init Js -->
    <script src="{{ asset('assets/front/js/index.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/front/js/app.js') }}"></script>

    {{-- Swiper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
