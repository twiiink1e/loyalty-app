@extends('layouts.userapp')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
@section('content')
    <section class="section">
        <div class="container" style="min-height: 750px">
            <div class="row row--top-40">
                <div class="col-md-6">
                    <h2 class="row__title">Point History</h2>
                </div>
                <div class="col-md-6 float-end">
                    <h2 class="row__title2">Current point: {{ $point->point }} points</h2>
                </div>
            </div>

            <div class="point-web">
                <div class="row row--top-20">
                    <div class="col-md-12">
                        <div class="table-container">
                            <table class="table" id="example">
                                <thead class="table__thead">
                                    <tr>
                                        <th class="table__th">Company</th>
                                        <th class="table__th">Paid / Claimed</th>
                                        <th class="table__th">Point</th>
                                        <th class="table__th">Date</th>
                                        <th class="table__th">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table__tbody">
                                    @foreach ($payments as $payment)
                                        <tr class="table-row table-row--chris">
                                            <td class="table-row__td">
                                                <div class="table-row__img">
                                                    @if (is_null($payment->company->logo))
                                                        <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                                                            class="img-fluid profile-image" style="max-height: 70px;">
                                                    @else
                                                        <img src="/logos/{{ $payment->company->logo }}"
                                                            class="img-fluid profile-image" style="max-height: 70px;">
                                                    @endif

                                                </div>
                                                <div class="table-row__info">
                                                    <p class="table-row__name">{{ $payment->company->name }}</p>
                                                </div>
                                            </td>
                                            <td data-column="reward" class="table-row__td">
                                                <div class="">
                                                    <p class="table-row__reward">{{ $payment->total }} $</p>
                                                    {{-- <span class="table-row__small"> </span> --}}
                                                </div>
                                            </td>

                                            <td data-column="Status" class="table-row__td">
                                                <p class="table-row__reward status--green">+
                                                    {{ $payment->total / $cal->main }}
                                                    points</p>
                                            </td>

                                            <td data-column="Date" class="table-row__td">
                                                <p class="table-row__reward">{{ $payment->created_at }}</p>
                                            </td>

                                            <td data-column="Date" class="table-row__td">
                                                <p class="table-row__status status--green status">
                                            </td>

                                        </tr>
                                    @endforeach

                                    @foreach ($redeems as $redeem)
                                        <tr class="table-row table-row--chris">
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
                                                </div>
                                            </td>
                                            <td data-column="reward" class="table-row__td">
                                                <div class="">
                                                    <p class="table-row__reward">{{ $redeem->reward->name }}</p>
                                                </div>
                                            </td>

                                            <td data-column="Status" class="table-row__td">
                                                <p class="table-row__reward status--red"> - {{ $redeem->reward->point }}
                                                    points
                                                </p>
                                            </td>

                                            <td data-column="Date" class="table-row__td">
                                                <p class="table-row__reward">{{ $redeem->created_at }}</p>
                                            </td>

                                            <td data-column="Status" class="table-row__td">
                                                @if ($redeem->status == 'canceled')
                                                    <p class="table-row__status status--red status">
                                                    @elseif ($redeem->status == 'success')
                                                    <p class="table-row__status status--green status">
                                                    @else
                                                    <p class="table-row__status status--green status">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="point-mobile">
                <div class="row row--top-20">
                    <div class="col-md-12">
                        <div class="table-container">
                            <table class="table">
                                <thead class="table__thead">
                                    <tr>
                                        <th class="table__th">Company</th>
                                        <th class="table__th">Payment</th>
                                        <th class="table__th">Point</th>
                                        <th class="table__th">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="table__tbody">
                                    @foreach ($payments as $payment)
                                        <tr class="table-row table-row--chris">
                                            <td class="table-row__td">
                                                <div class="table-row__img">
                                                    @if (is_null($payment->company->logo))
                                                        <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                                                            class="img-fluid profile-image" style="max-height: 70px;">
                                                    @else
                                                        <img src="/logos/{{ $payment->company->logo }}"
                                                            class="img-fluid profile-image" style="max-height: 70px;">
                                                    @endif

                                                </div>
                                                <div class="table-row__info">
                                                    <p class="table-row__name">{{ $payment->company->name }}</p>
                                                </div>
                                            </td>
                                            <td data-column="reward" class="table-row__td">
                                                <div class="">
                                                    <p class="table-row__reward">{{ $payment->total }}</p>
                                                    {{-- <span class="table-row__small"> </span> --}}
                                                </div>
                                            </td>

                                            <td data-column="Status" class="table-row__td">
                                                <p class="table-row__reward status--green">+
                                                    {{ $payment->total / $cal->main }}
                                                    points</p>
                                            </td>

                                            <td data-column="Date" class="table-row__td">
                                                <p class="table-row__reward">{{ $payment->created_at }}</p>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @foreach ($redeems as $redeem)
                                        <tr class="table-row table-row--chris">
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
                                                </div>
                                            </td>
                                            <td data-column="reward" class="table-row__td">
                                                <div class="">
                                                    <p class="table-row__reward">{{ $redeem->reward->name }}</p>
                                                </div>
                                            </td>

                                            <td data-column="Status" class="table-row__td">
                                                <p class="table-row__reward status--red"> - {{ $redeem->reward->point }}
                                                    points
                                                </p>
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

        </div>
    </section>

    <script>
        $(document).ready(function() {
            // DataTable initialisation
            $('#example').DataTable({
                "paging": true,
                "autoWidth": true,
                "columnDefs": [{
                    "targets": 3,
                    render: function(data, type, full, meta) {
                        if (type === 'display' && data == 'Done') {
                            var rowIndex = meta.row + 1;
                            $('#example tbody tr:nth-child(' + rowIndex + ')').addClass(
                                'lightRed');
                            return data;
                        } else {
                            return data;
                        }
                    }
                }]
            });
        });
    </script>
@endsection
