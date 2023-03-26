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
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Input</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('redeems.update', $redeem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"
                                                    {{ $redeem->customer_id == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Customer</label>
                                        <select required class="form-control" data-trigger name="reward_id"
                                        id="choices-single-default"
                                        placeholder="Choose reward" >
                                            @foreach ($rewards as $reward)
                                                <option value="{{ $reward->id }}"
                                                    {{ $redeem->reward_id == $reward->id ? 'selected' : '' }}>
                                                    {{ $reward->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Status</label>
                                        <select class="form-select form-select-lg mb-3" name="status"
                                            aria-label=".form-select-lg example" required>
                                            <option value="pending">Pending</option>
                                            <option value="success">Success</option>
                                        </select>
                                    </div>

                                    <div class="float-end mt-2">
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
