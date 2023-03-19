@extends('layouts.userapp')
@section('content')
    <section class="section">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col">
                    <h4 style="color: black;line-height: 75px; text-decoration: underline">Announcement List</h4>
                </div>

                <div class="col">
                    <div class="search-bar">
                        <form id="searchthis" action="{{ route('announcements.search') }}" style="display:inline;" method="get">
                            <input id="namanyay-search-box" name="inputSearch" size="40" type="text"
                                placeholder="Search" value="{{ request('inputSearch') }}" />
                            {{-- <input id="namanyay-search-btn" value="Go" type="button"/> --}}
                            <span id="namanyay-search-btn">
                                <button type="submit">
                                    <i class='bx bx-search'></i>
                                </button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @foreach ($announcements as $announcement)
                    <div class="col-xs-12 col-sm-4">
                        <div class="card p-3 mb-3">
                            <img src="/thumbnails/{{ $announcement->thumbnail }}" height="350px">
                            <div class="card-block">
                                <h4 class="card-title mt-3">{{ $announcement->topic }}</h4>
                                <p class="card-text">{{ $announcement->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $announcement->company->name }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

@endsection
