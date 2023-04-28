
@extends('layouts.adminapp')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                {{-- <h4 class="mb-sm-0 font-size-18">Welcome !</h4> --}}

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        {{-- <li class="breadcrumb-item active">Welcome !</li> --}}
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Customers</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $customerCount }}"></span>
                            </h4>
                            <div class="text-nowrap">
                                <a href="/admin/customers">
                                    <span class="ms-1 text-muted font-size-13">See detail</span>
                                </a>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            {{-- <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                            <i class="mdi mdi-account-outline" style="font-size: 60px; color: #1870CA"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Rewards</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $rewardCount }}"></span>
                            </h4>
                            <div class="text-nowrap">
                                <a href="/admin/rewards">
                                    <span class="ms-1 text-muted font-size-13">See detail</span>
                                </a>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            {{-- <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                            <i class="mdi mdi-gift-outline" style="font-size: 60px; color: #1870CA"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->


        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Announcement</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $announcementCount }}"></span>
                            </h4>
                            <div class="text-nowrap">
                                {{-- <span class="badge bg-soft-success text-success">+$20.9k</span> --}}
                                <a href="/admin/announcements">
                                    <span class="ms-1 text-muted font-size-13">See detail</span>
                                </a>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            {{-- <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                            <i class="mdi mdi-clipboard-text-outline" style="font-size: 60px; color: #1870CA"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->


        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Redeem</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $redeemCount }}"></span>
                            </h4>
                            <div class="text-nowrap">
                                <a href="/admin/redeems">
                                    <span class="ms-1 text-muted font-size-13">See detail</span>
                                </a>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            {{-- <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                            <i class="mdi mdi-book-check-outline" style="font-size: 60px; color: #1870CA"></i>

                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row -->

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="my-0"><i class="mdi mdi-office-building-outline me-3"></i>About Company
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                            class="card-text float-end">Edit</a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="pb-3">
                                    <div class="text-muted">
                                        @foreach ($companies as $company)
                                            <p class="mb-2">Company Name:</p>
                                            <h5 class="font-size-15">{{ $company->name }}</h5>

                                            <p class="mb-2">Phone Number:</p>
                                            <h5 class="font-size-15">{{ $company->phone }}</h5>

                                            <p class="mb-2">Address:</p>
                                            <h5 class="font-size-15">{{ $company->address }}</h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end tab pane -->
            </div>
            @forelse($calculations as $calculation)
                <div class="row">
                    <div class="col">
                        <div class="card border">
                            <div class="card-header bg-transparent">
                                <h5 class="my-0">
                                    <i class="mdi mdi-alarm-plus me-3"></i>Calculation
                                    <a class="card-text float-end" style="cursor: pointer" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        Edit
                                    </a>
                                </h5>


                                <!-- Static Backdrop Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Point calculation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('calculations.update', $calculation->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">1
                                                            POINT =</label>
                                                        <div class="col-sm-9 mb-3">
                                                            <input type="text" class="form-control"
                                                                id="horizontal-firstname-input" placeholder="Enter amount"
                                                                name="main" value="{{ $calculation->main }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">1 POINT = {{ $calculation->main }} $</h5>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>

            @empty

                <div class="row">
                    <div class="col">
                        <div class="card border">
                            <div class="card-header bg-transparent">
                                <h5 class="my-0">
                                    <i class="mdi mdi-alarm-plus me-3"></i>Calculation
                                    <a class="card-text float-end" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop" style="cursor: pointer">
                                        Create
                                    </a>
                                </h5>


                                <!-- Static Backdrop Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Point calculation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('calculations.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">

                                                        <select class="form-select form-select-lg mb-3" name="company_id"
                                                            aria-label=".form-select-lg example" hidden>
                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id }}">{{ $company->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">1
                                                            POINT =</label>
                                                        <div class="col-sm-9 mb-3">
                                                            <input type="text" class="form-control"
                                                                id="horizontal-firstname-input" placeholder="Enter amount"
                                                                name="main">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">1 points = ... $</h5>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
            @endforelse

        </div>

        <div class="col-xl-6 col-md-6">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="my-0"><i class="mdi mdi-gift-outline me-3"></i>Reward list<a
                                            href="/admin/rewards" class="card-text float-end">View</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Point</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rewards as $reward)
                                            <tr>
                                                <td>{{ $reward->id }}</td>
                                                <td>{{ $reward->name }}</td>
                                                <td>{{ $reward->point }}</td>
                                                <td>{{ $reward->remark }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- end card body -->

                    </div><!-- end card -->

                </div><!-- end tab pane -->

            </div><!-- end tab content -->

        </div><!-- end col -->

    </div> <!-- end row -->


@endsection
