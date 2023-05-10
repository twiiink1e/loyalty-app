@extends('layouts.userapp')

@section('content')
    <section class="section" style="min-height: 1000px">
        @if ($message = Session::get('success'))
            <div class="alert alert-danger text-center" style="position: absolute; left: 100px; top: 205px">
                <h2>{{ $message }}</h2>
            </div>
        @endif

        <div class="row">
            <div class="col">
                <h2 class="price-sub__heading" style="line-height: 120px; margin-left: 30px">Announcement Details</h2>
            </div>

        </div>
        <main class="item">
            <section class="img">
                <img src="/rewardImages/{{ $announcement->reward->image }}" class="img-main">
            </section>

            <section class="price">

                <h2 class="price-sub__heading">{{ $announcement->company->name }}</h2>
                <h1 class="price-main__heading">{{ $announcement->topic }}</h1>
                <span class="price-box__old">{{ $announcement->reward->name }}</span>
                <p class="price-txt">
                    {{ $announcement->description }}

                </p>
                <div class="price-box">
                    <div class="price-box__main">
                        <span class="price-box__main-new">{{ $announcement->reward->point }} points</span>

                    </div>

                    @forelse($points as $point)
                        <span class="price-box__old">Your current point: {{ $point->point }}</span>

                        <div class="price-btnbox">
                            <button class="btn btn-primary btn--orange" id="open-modal">Claim</button>
                        </div>
                    @empty
                        <span class="price-box__old">Your current point: 0</span>

                        <div class="price-btnbox">
                            <a href="/announcements">
                                <button class="btn btn-primary btn--orange">Go Back</button>
                            </a>
                        </div>
                    @endforelse

                </div>

                @if (is_null($customer))
                @else
                    <div class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Confirmation</h3>
                                <span id="close-modal">&times;</span>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('frontannouncements.store') }}" method="POST">
                                    @csrf
                                    <p>Are you sure to redeem this reward?</p>
                                    <p>Claim: {{ $announcement->reward->name }}</p>
                                    <p>Cost: {{ $announcement->reward->point }} points</p>

                                    @forelse($points as $point)
                                        <p>Your current point: {{ $point->point }} points</p>
                                    @empty
                                        <p>Your current point: 0 points</p>
                                    @endforelse

                                    <input type="text" value="{{ $announcement->reward->id }}" name="reward_id" hidden>
                                    <input type="text" value="{{ $announcement->company->id }}" name="company_id"
                                        hidden>
                                    <input type="text" value="{{ $customer->id }}" name="customer_id" hidden>

                                    <button class="btn btn-primary float-end" style="border-radius: 3rem"
                                        type="submit">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>
                @endif

            </section>
        </main>
    </section>

    <script>
        const modal = document.querySelector(".modal");
        const openModalBtn = document.querySelector("#open-modal");
        const closeModalBtn = document.querySelector("#close-modal");

        openModalBtn.addEventListener("click", function() {
            modal.style.display = "block";
        });

        closeModalBtn.addEventListener("click", function() {
            modal.style.display = "none";
        });
    </script>

    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(3000, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script>
@endsection
