@extends('layouts.app')

@section('content')
    <a href="{{ route('welcome') }}">
        <button class="back_button">
            <i class='bx bx-home'></i>
        </button>
    </a>
    <div class="login-form py-4" style="margin-top: 150px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-sm">

                        {{-- <span class="shape"></span> --}}
                        
                        <div class="card-header text-center bg-transparent">
                            <img src="{{ asset('assets/images/logo2.png') }}" alt="" style="margin-right: 30px">
                        </div>
                        
                        <div class="card-body py-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <span><i class='bx bxs-error'></i>Wrong email or password. Please try again</span>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Email Address"
                                        required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input class="form-control" type="password" placeholder="Password" name="password"
                                        required autocomplete="current-password" id="id_password">
                                    <span class="input-icon2"><i class="far fa-eye" id="togglePassword"></i></span>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <div class="d-flex justify-content-center" style="margin-top: -25px">

                                    <div class="form-group">
                                        @if (Route::has('password.request'))
                                            <span class="forgot-pass"><a href="{{ route('password.request') }}"
                                                    class="login_link">Forgot
                                                    Password</a></span>
                                        @endif
                                        <span class="login_link">/</span>
                                    </div>
     

                                    <div class="form-group">
                                        <span><a href="" class="login_link" data-toggle="modal"
                                                data-target="#exampleModalCenter">Register</a></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn1">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Register as</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 50px">
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-outline-primary btn-block">MERCHANT</button>
                    </a>
                    <p class="text-center mt-3">OR</p>
                    <a href="{{ route('registerCus') }}">
                        <button type="button" class="btn btn-outline-primary btn-block">CUSTOMER</button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(2200, 800).slideUp(800, function() {
                $(".alert").alert('close');
            });
        });
    </script>
@endsection
