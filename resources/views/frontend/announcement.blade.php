@extends('layouts.userapp')
@section('content')
<section class="section">
    <div class="row justify-content-center">
        <div class="row">
            <h5 style="background-color: #1A374D; color: white; line-height: 50px;">Announcement List</h5>
        </div>

        @for ($i = 0; $i <= 3; $i++)
        <div class="row mt-4">
            <div class="col-xs-12 col-sm-4">
                <div class="card p-3">
                    <img class="img-card"
                        src="https://www.designyourway.net/blog/wp-content/uploads/2010/11/Nike-Print-Ads-10.jpg"
                        alt="Card image cap">   
                    <div class="card-block">
                        <h4 class="card-title mt-3">NIKE</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="card p-3">
                    <img class="img-card"
                        src="https://newspaperads.ads2publish.com/wp-content/uploads/2017/10/adidas-uprising-wear-it-at-the-uprising-ad-times-of-india-mumbai-14-10-2017.jpg"
                        alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title mt-3">NIKE</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="card p-3">
                    <img class="img-card"
                        src="https://media.karousell.com/media/photos/products/2022/8/27/nike_dunk_low_gym_red_uk_75_bn_1661599395_fa0aa19e_progressive.jpg"
                        alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title mt-3">NIKE</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</section>
@endsection
