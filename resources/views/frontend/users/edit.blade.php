@extends('layouts.userapp')
<style>
    h1 {
        font-size: 18px !important;
        text-align: center;
        margin: 40px 0 20px;
    }

    h3 {
        font-size: 15px;
        text-align: center;
        margin: -15px 0 20px;
        opacity: 70%;
    }

    h1 small {
        display: block;
        font-size: 15px;
        padding-top: 8px;
        color: gray;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 150px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        margin-top: 0px;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }


    /* //////////  EDIT PROFILE  ///////////// */

    .profile-tab-nav {
        min-width: 250px;
    }

    .tab-content {
        flex: 1;
    }

    .nav-pills a.nav-link {
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        color: #333;
    }

    .nav-pills a.nav-link i {
        width: 20px;
    }

    .img-circle img {

        height: 100px;
        width: 100px;
        border-radius: 100%;
        border: 5px solid #fff;
    }

    .card {
        padding: 30px;
    }

    input[type=text] {
        font-size: 14px;
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 1px solid rgb(195, 195, 195);
    }
</style>

@section('content')
    <section class="section">
        <div class="container" style="margin-top: 100px; padding-bottom:100px; ">
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <h1>{{ $user->name }}</h1>
                            <h3>{{ $user->email }}</h3>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview"
                                        style="background-image: url('https://img.myloview.com/stickers/default-avatar-profile-icon-vector-unknown-social-media-user-photo-400-209987478.jpg');">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div class="card">
                            <h1 style="text-align: left; margin-left: 10px">User Information</h1>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="card-body" style="margin-top: -20px">
                                    <hr />

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" style="margin-top: 15px">
                                            <strong>Full name:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div><br />

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Phone Number:</strong>
                                            <input type="text" name="phone" class="form-control" placeholder="Phone"
                                                value="{{ $user->phone }}" disabled>
                                        </div>
                                    </div><br />
                                    
                                </div>

                                <div class="card-footer" style="background-color: #fff">
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="margin-top: 20px; width: 150px">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
