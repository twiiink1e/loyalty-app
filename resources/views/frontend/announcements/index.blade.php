@extends('layouts.userapp')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@section('content')

    <section class="section" style=" min-height: 1000px">
        <div class="row justify-content-center">
            <div class="row" style="background-color: #F8F8F8; position: sticky;top: 60px; z-index: 999; opacity: 96%; box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;">
                <div class="col" style="top:20px">
                    <h1 class style="color: black;line-height: 85px; padding-bottom: 20px;">Announcement List</h1>
                </div>

                <div class="col" style="top:20px">
                    <div class="search-bar">
                        <form id="searchthis" action="{{ route('announcements.search') }}" style="display:inline;"
                            method="get">
                            <span>
                                <select class="form-control select2" style="width: 200px;" tabindex="-1" aria-hidden="true"
                                    name="inputSelect">
                                    <option value="">Search Company</option>

                                    @foreach ($companies as $company)
                                        @if ($company->name == '...')
                                        @else
                                            <option value="{{ $company->id }}"
                                                {{ old('inputSelect', request()->get('inputSelect')) == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </span>

                            <input id="namanyay-search-box" name="inputSearch" size="40" type="text"
                                placeholder="Search" value="{{ request('inputSearch') }}" />

                            <span id="namanyay-search-btn">
                                <button type="submit">
                                    <i class='bx bx-search'></i>
                                </button>
                            </span>
                        </form>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mt-2 mb-0">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($success))
                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mt-2 mb-0"
                        role="alert">
                        <i class="mdi mdi-block-helper label-icon"></i><strong>Error: </strong> {{ $success }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="announcement-mobile">
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-xs-12 col-sm-4 p-3" style="cursor: pointer">
                            <a class="card p-3 mb-2" style="color: black;"
                                href="{{ route('frontannouncements.show', $announcement->id) }}">
                                <img src="/thumbnails/{{ $announcement->thumbnail }}" height="350px">
                                <div class="card-block" style="padding: 20px">
                                    <h4 class="card-title mt-3">{{ $announcement->topic }}</h4>
                                    <p class="card-text">{{ $announcement->description }}</p>
                                    <p class="card-text"><small
                                            class="text-muted">{{ $announcement->company->name }}</small>
                                    </p>
                                </div>
                            </a>
                        </div>
                    @empty

                        <img src="https://cdn.dribbble.com/users/1242216/screenshots/9326781/dribbble_shot_hd_-_3_4x.png"
                            alt="" style="width: 900px; margin: auto; padding-top: 35px">
                    @endforelse
                </div>
            </div>

            <div class="announcement-web" style="margin-top: 30px">
                @forelse ($announcements as $announcement)
                    <a href="{{ route('frontannouncements.show', $announcement->id) }}" class="projcard-container">

                        <div class="projcard projcard-blue">
                            <div class="projcard-innerbox">
                                <img class="projcard-img" src="/thumbnails/{{ $announcement->thumbnail }}" />
                                <div class="projcard-textbox">
                                    <div class="projcard-title">{{ $announcement->company->name }}</div>
                                    <div class="projcard-subtitle">{{ $announcement->topic }}</div>
                                    <div class="projcard-bar"></div>
                                    <div class="projcard-subtitle">Reward: {{ $announcement->reward->name }}</div>
                                    <div class="projcard-description">{{ $announcement->description }}</div>
                                    <div class="projcard-tagbox">
                                        <span class="">
                                            <button class="btn btn-primary" style="border-radius: 3rem" type="button">View
                                            </button>
                                        </span>
                                        {{-- <span class="projcard-tag">CSS</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>

                @empty

                <div class="d-flex justify-content-center">                    
                    <img src="assets/images/noresult.jpg"
                    alt="noresult" style="max-width: 900px;  padding-top: 35px">
                </div>

                @endforelse
            </div>


        </div>

    </section>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                closeOnSelect: false
            });
        });
    </script>

    <script>
        // This adds some nice ellipsis to the description:
        document.querySelectorAll(".projcard-description").forEach(function(box) {
            $clamp(box, {
                clamp: 6
            });
        });
    </script>

@endsection
