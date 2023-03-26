@extends('layouts.userapp')
@section('content')
    <section class="section" style="margin-top: 20px">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col">
                    <h1 class style="color: black;line-height: 75px;">Announcement List</h1>
                </div>

                <div class="col">
                    <div class="search-bar">
                        <form id="searchthis" action="{{ route('announcements.search') }}" style="display:inline;" method="get">
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

            <div class="row">
                @forelse ($announcements as $announcement)
                    <div class="col-xs-12 col-sm-4 p-3" style="cursor: pointer">
                        <a class="card p-3 mb-2" style="color: black" href="{{ route('frontannouncements.show', $announcement->id)}}">
                            <img src="/thumbnails/{{ $announcement->thumbnail }}" height="350px">
                            <div class="card-block">
                                <h4 class="card-title mt-3">{{ $announcement->topic }}</h4>
                                <p class="card-text">{{ $announcement->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $announcement->company->name }}</small></p>
                            </div   >
                        </a>
                    </div>
                    @empty
   
                    <img src="https://cdn.dribbble.com/users/1242216/screenshots/9326781/dribbble_shot_hd_-_3_4x.png" alt="" style="width: 900px; margin: auto; padding-top: 35px">

                @endforelse
            </div>

           
        </div>

    </section>

@endsection
