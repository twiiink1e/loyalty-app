@extends('layouts.adminapp')
@section('content')

<div class="container" style="margin-top: 150px;  margin-right: 200px ">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-10">

                <div class="card">
                    <h3 style="text-align: left; margin-left: 15px; margin-top: 20px">Change Admin Password</h3>

                    <form action="{{ route('admin-update-password') }}" method="POST">
                        @csrf
                        <div class="card-body" style="margin-top: -20px">
                            <hr />
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                {{-- <label for="oldPasswordInput" class="form-label">Old Password</label> --}}
                                <h6>Old Password:</h6>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br />
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                {{-- <label for="newPasswordInput" class="form-label">New Password</label> --}}
                                <h6>New Password:</h6>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br />
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                {{-- <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label> --}}
                                <h6>Confirm New Password:</h6>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" style="width: 150px">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection