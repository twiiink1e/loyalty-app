@extends('layouts.userapp')
@section('content')

<section class="contact_us">
    {{-- <div class="loader" style="margin-top: -150px">
        <div class="loader-content">
            <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="contact_inner">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="contact_form_inner">
                                <div class="contact_field">

                                    <h3>Contact Us</h3>
                                    <p>Any suggestion or question? Feel Free to contact us any time.
                                    </p>

                                    @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ $message }}</p>
                                                </div>
                                                @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your
                                                    input.<br><br>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                    <form class="" action="" method="POST">

                                        @csrf
                                        <input type="email" name="email" class="form-control form-group" placeholder="Email" />
                                        <input type="text" name="subject" class="form-control form-group" placeholder="Subject" />
                                        <textarea class="form-control form-group" name="message" placeholder="Message"></textarea>
                                        <button type="submit" id="btn" class="contact_form_submit">Send</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact_info_sec">
                        <h4>Contact Info</h4>
                        <div class="d-flex info_single align-items-center">
                            <i class='bx bxs-phone-call'></i>
                            <span>+855 12 123 456</span>
                        </div>
                        <div class="d-flex info_single align-items-center">
                            <i class='bx bx-envelope'></i>
                            <span>loyaltee@gmail.com</span>
                        </div>
                        <div class="d-flex info_single align-items-center">
                            <i class='bx bx-map'></i>
                            <span>#123, St 123, Toul Tompong, Phnom Penh, Cambodia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
