@extends('layouts.userapp')

@section('content')
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
                                <form action="#">
                                    <input type="text" class="control-form" id="inputemail"
                                        placeholder="Enter your phone number">
                                    <button type="submit" class="btn btn-primary">Get started</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 offset-xl-1">
                        <div class="mt-lg-0 mt-5">
                            <img src="assets/front/images/new_bg.png" alt="home04" class="home-img" style="width: 150%">
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
    <section class="section" id="features">
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
                                Enjoy the limitless style of Parisian design. A major player
                                since
                                bursting onto the fashion scene in 1933.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="cardhome">
                        <a class="img-card" href="#">
                            <img
                                src="https://www.cafe-amazon.com/BackEnd/TempPromotion/f46a16655be0434db320d8aadcca497b.jpg" />

                        </a>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="#">Amazon Cafe</a>
                            </h4>
                            <p class="">
                                Enjoy the limitless style of Parisian design. A major player
                                since
                                bursting onto the fashion scene in 1933.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="cardhome">
                        <a class="img-card" href="#">
                            <img
                                src="https://sg.everydayonsales.com/wp-content/uploads/2020/08/Adidas-Opening-Sale-at-Shopee.jpg" />
                        </a>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="#">Adidas</a>
                            </h4>
                            <p class="">
                                Enjoy the limitless style of Parisian design. A major player
                                since
                                bursting onto the fashion scene in 1933.
                            </p>
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
@endsection
