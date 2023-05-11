@extends('layouts.app')

@section('content')
    <a href="{{ route('welcome') }}">
        <button class="back_button">
            <i class='bx bx-home'></i>
        </button>
    </a>

    <div class="login-form py-4" style="margin-top: 50px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-sm">

                        {{-- <span class="shape"></span> --}}
                        <div class="card-header text-center bg-transparent">

                            <img src="{{ asset('assets/images/logo2.png') }}" alt="" style="margin-right: 30px">
                            <h5 style="text-decoration: underline; color: #002B5B; font-weight: bold;">Merchant Register</h5>

                        </div>
                        <div class="card-body py-4">
                            <div class="d-flex justify-content-center">
                                <div class="progress-container">
                                    <div class="progress" id="progress"></div>
                                    <div class="circle active"><i class="fa fa-user"></i></div>
                                    <div class="circle"><i class="fa fa-cart-plus"></i></div>
                                    <div class="circle"><i class="fa fa-file-image"></i></div>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="account-form" id="account">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autofocus placeholder="Enter your name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Enter your email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Enter your password">
                                        <span class="input-icon2"><i class="far fa-eye" id="togglePassword"></i></span>


                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group" style="margin-top: -20px">
                                        <label for="name">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Enter your confirm password">
                                        <span class="input-icon2"><i class="far fa-eye" id="togglePassword"></i></span>

                                    </div>

                                    <div class="form-group" hidden>
                                        <select class="form-select" name="type">
                                            <option value="1" selected>Merchant</option>
                                        </select>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="company-form" id="company" hidden>
                                    <div class="form-group">
                                        <label for="phone">Company Phone</label>
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" placeholder="Enter Company Number">
                                    </div>

                                    <div class="form-group">
                                        <label for="company-name">Company Name</label>
                                        <input id="company-name" type="text" class="form-control" name="company-name"
                                            value="{{ old('company-name') }}" placeholder="Enter Company Name">
                                    </div>
                                    <div class="form-group" style="padding-bottom: 20px">
                                        <label for="company-address">Company Address</label>
                                        <input id="company-address" type="text" class="form-control"
                                            name="company-address" value="{{ old('company-address') }}"
                                            placeholder="Enter Company address">
                                    </div>
                                </div>

                                <div class="logo-form" id="logo" hidden style="padding-bottom: 20px">
                                    <div class="form-control">
                                        <div class="d-flex justify-content-center">
                                            <div class="holder">
                                                <img class="logo-img" id="imgPreview"
                                                    src="assets/images/upload.png"
                                                    alt="pic" />
                                            </div>
                                        </div>

                                        <input type="file" name="logo" id="photo" required="true" style="width: 100%"/>

                                    </div>
                                </div>

                                {{-- <div class="d-flex justify-content-center" style="margin-top: -25px">
                                    <div class="form-group">
                                        <span><a href="{{ route('login') }}" class="login_link">Back to login</a></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn">Register</button>
                                </div> --}}

                                <div class="d-flex justify-content-center">
                                    <button class="btn1" id="prev" type="button" disabled>Prev</button>
                                    <button class="btn1" id="next" type="button">Next</button>
                                    <button type="submit" class="btn1" id="submit" hidden>Submit</button>
                                </div>

                                <div class="d-flex justify-content-center" style="margin-top: 20px">
                                    <span><a href="{{ route('login') }}" class="login_link">Back to login</a></span>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const progress = document.getElementById("progress");
        const prev = document.getElementById("prev");
        const next = document.getElementById("next");
        const circles = document.querySelectorAll(".circle");

        let currentActive = 1;

        next.addEventListener("click", () => {
            currentActive++;

            if (currentActive > circles.length) {
                currentActive = circles.length;
            }

            update();
        });

        prev.addEventListener("click", () => {
            currentActive--;

            // prevents currentActive from going below 1
            if (currentActive < 1) {
                currentActive = 1;
            }

            update();
        });

        function update() {
            circles.forEach((circle, idx) => {
                if (idx < currentActive) {
                    circle.classList.add("active");
                } else {
                    circle.classList.remove("active");
                }
            });

            const actives = document.querySelectorAll(".active");

            progress.style.width =
                ((actives.length - 1) / (circles.length - 1)) * 100 + "%";

            // disables prev when you can't go back further, disables next when there are no more steps
            if (currentActive === 1) {
                prev.disabled = true;
                next.hidden = false;
                submit.hidden = true;

                account.hidden = false;
                company.hidden = true;
                logo.hidden = true;
            } else if (currentActive === circles.length) {
                next.hidden = true;
                submit.hidden = false;

                logo.hidden = false;
                company.hidden = true;

            } else {
                prev.disabled = false;
                next.disabled = false;
                next.hidden = false;
                submit.hidden = true;

                company.hidden = false;
                account.hidden = true;
                logo.hidden = true;

            }
        }
    </script>

    <script>
        $(document).ready(() => {
            $("#photo").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
