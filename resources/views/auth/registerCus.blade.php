@extends('layouts.app')

@section('content')
    <a href="{{ route('welcome') }}">
        <button class="back_button">
            <i class='bx bx-home'></i>
        </button>
    </a>

    <div class="login-form py-4" style="margin-top: 0px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-sm">

                        {{-- <span class="shape"></span> --}}

                        <div class="card-header text-center bg-transparent">
                            <img src="{{ asset('assets/images/logo2.png') }}" alt="" style="margin-right: 30px">

                            <h5 style="text-decoration: underline; color: #002B5B; font-weight: bold">Customer Register</h5>
                        </div>

                        <div class="card-body py-2">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter your name">

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
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone"
                                        placeholder="Enter your number">

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

                                <div class="form-group" style="margin-top: -20px" hidden>
                                    <label for="name">Role</label>
                                    <select class="form-select" name="type">
                                        <option value="0" selected>Customer</option>
                                    </select>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="d-flex justify-content-center" style="margin-top: -25px">
                                    <div class="form-group">
                                        <span><a href="{{ route('login') }}" class="login_link">Back to login</a></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn1">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
