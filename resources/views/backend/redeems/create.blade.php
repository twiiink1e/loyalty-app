@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Redeem Information</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Redeem Information</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Input</h4>
                    <p class="card-title-desc">Fill all information below</p>

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


                <div class="card-body p-4">
                    <form action="{{ route('redeems.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div>

                                    <select class="form-select form-select-lg mb-3" name="company_id"
                                        aria-label=".form-select-lg example" hidden>
                                        {{-- <option value="">Choose company</option> --}}
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Customer</label>
                                        <select class="form-control" data-trigger name="customer_id"
                                        id="choices-single-default"
                                        placeholder="Choose customer" required>
                                            <option value="">Choose Customer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"
                                                    {{ old('customer_id', request()->get('customer_id')) == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Reward</label>
                                        <select required class="form-control" data-trigger name="reward_id"
                                        id="choices-single-default"
                                        placeholder="Choose reward" >
                                            <option value="">Choose Reward</option>
                                            {{-- <option value="">Choose company</option> --}}
                                            @foreach ($rewards as $reward)
                                                <option value="{{ $reward->id }}"
                                                    {{ old('reward_id', request()->get('reward_id')) == $reward->id ? 'selected' : '' }}>
                                                    {{ $reward->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Status</label>
                                        <select class="form-select form-select-lg mb-3" name="status"
                                            aria-label=".form-select-lg example" required>
                                            {{-- <option value="">Choose Status</option> --}}
                                            <option selected value="pending">Pending</option>
                                            <option value="success">Success</option>
                                        </select>
                                    </div>


                                    <div class="float-end mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
