@extends('layouts.userapp')
@section('content')
    <section class="section">
        <div class="container" style="min-height: 750px">
            <div class="row row--top-40">
                <div class="col-md-12">
                    <h2 class="row__title">Redeem History</h2>
                </div>
            </div>
            <div class="row row--top-20">
                <div class="col-md-12">
                    <div class="table-container">
                        <table class="table">
                            <thead class="table__thead">
                                <tr>
                                    <th class="table__th">Reference</th>
                                    <th class="table__th">Company Name</th>
                                    <th class="table__th">reward</th>
                                    <th class="table__th">Status</th>
                                    <th class="table__th">Date</th>
                                </tr>
                            </thead>
                            <tbody class="table__tbody">
                                @foreach ($redeems as $redeem)
                                    <tr class="table-row table-row--chris">
                                        <td data-column="reward" class="table-row__td">
                                            <div class="">
                                                <p class="table-row__reward">#{{ $redeem->code }}</p>
                                            </div>
                                        </td>
                                        <td class="table-row__td">
                                            <div class="table-row__img">
                                                @if (is_null($redeem->company->logo))
                                                    <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                                                        class="img-fluid profile-image" style="max-height: 70px;">
                                                @else
                                                    <img src="/logos/{{ $redeem->company->logo }}"
                                                        class="img-fluid profile-image" style="max-height: 70px;">

                                                @endif

                                            </div>
                                            <div class="table-row__info">
                                                <p class="table-row__name">{{ $redeem->company->name }}</p>
                                                {{-- <span class="table-row__small">CFO</span> --}}
                                            </div>
                                        </td>
                                        <td data-column="reward" class="table-row__td">
                                            <div class="">
                                                <p class="table-row__reward">{{ $redeem->reward->name }}</p>
                                                <span class="table-row__small">{{ $redeem->reward->point }} points</span>
                                            </div>
                                        </td>
                                        <td data-column="Status" class="table-row__td">
                                            @if ($redeem->status == 'pending')
                                                <p class="table-row__status status--yellow status">
                                                    {{ $redeem->status }}</p>
                                            @elseif ($redeem->status == 'success')
                                                <p class="table-row__status status--green status">
                                                    {{ $redeem->status }}</p>
                                            
                                            @else
                                            <p class="table-row__status status--red status">
                                                {{ $redeem->status }}</p>

                                            @endif
                                        </td>
                                        <td data-column="Date" class="table-row__td">
                                            <p class="table-row__reward">{{ $redeem->created_at }}</p>
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
