@extends('layouts.userapp')

@section('content')
    <section class="section" style="min-height: 800px">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col">
                    <h2 class="row__title">Profile Point</h2>
                </div>
            </div>

            <div class="row">
                {{-- @for ($i = 0; $i < 9; $i++) --}}
                @forelse($points as $point)
                    <div class="col-md-4 mt-4">
                        <div class="card1">

                            <div class="top-container">

                                @if (is_null($point->company->logo))
                                <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                                class="img-fluid profile-image" style="max-height: 70px;">
                                

                                @else
                                <img src="/logos/{{ $point->company->logo }}"
                                class="img-fluid profile-image" style="max-height: 70px;">
                                @endif
                                

                                <div class="ms-4">
                                    <h3 class="name">{{ $point->company->name }}</h3>
                                </div>
                            </div>


                            <div class="middle-container d-flex justify-content-between align-items-center mt-3 p-2">
                                <div class="dollar-div px-3">

                                    <div class="round-div"><i class="fa fa-trophy dollar"></i></div>

                                </div>
                                <div class="d-flex flex-column" >
                                    <span class="current-balance">Current Point</span>
                                    <span class="amount"><span class="dollar-sign"></span>{{ $point->point }} pts</span>
                                </div>
                            </div>


                        </div>

                    </div>

                    @empty 

                    <img src="https://www.itinerantnotes.com/blog-theme/images/empty.gif" alt="">

                @endforelse
            </div>

    </section>
@endsection
