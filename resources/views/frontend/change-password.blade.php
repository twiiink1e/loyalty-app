@extends('layouts.app')

@section('content')
    <a href="{{ route('welcome') }}">
        <button class="back_button">
            <i class='bx bx-home'></i>
        </button>
    </a>
    <section class="section">
        <div class="login-form py-4" style="margin-top: 80px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-sm">
                            <span class="shape"></span>
                            <div class="card-header text-center bg-transparent">
                                <img src="{{ asset('assets/images/logo2.png') }}" alt="" style="margin-right: 30px">
                            </div>
                            <div class="card-body py-4">
                                <form method="POST" action="{{ route('user-update-password') }}">
                                    @csrf

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="name">Old Password</label>
                                        <input name="old_password" type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            id="oldPasswordInput" placeholder="Enter your old password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="name">New Password</label>
                                        <input name="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            id="newPasswordInput" placeholder="Enter your new password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Confirm New Password</label>
                                        <input name="new_password_confirmation" type="password" class="form-control"
                                            id="confirmNewPasswordInput" placeholder="Enter confirm password">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
