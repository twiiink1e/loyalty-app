@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Payment Information</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Payment Information</li>
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

                    <button type="button" class="btn btn-light btn-md waves-effect float-end text-primary"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-top: -40px">
                        Create new customer
                    </button>

                    <!-- Static Backdrop Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Create new customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('customerStore') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <select class="form-select form-select-lg mb-3" name="company_id"
                                                aria-label=".form-select-lg example" hidden>
                                                {{-- <option value="">Choose company</option> --}}
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>

                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-12 mb-3">
                                                <input type="text" class="form-control" id="horizontal-firstname-input"
                                                    placeholder="Enter customer name" name="name" required>
                                            </div>

                                            <label for="horizontal-firstname-input" class="col-sm-6 col-form-label">Phone Number</label>
                                            <div class="col-sm-12 mb-3">
                                                <input type="text" class="form-control" id="horizontal-firstname-input"
                                                    placeholder="Enter customer number" name="phone" required>
                                            </div>

                                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-12 mb-3">
                                                <input type="text" class="form-control" id="horizontal-firstname-input"
                                                    placeholder="Enter customer address" name="address" required>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-info">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                </div>
                <div class="card-body p-4">
                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Company Name</label>
                                        <select class="form-select form-select-lg mb-3" name="company_id"
                                            aria-label=".form-select-lg example">
                                            {{-- <option value="">Choose company</option> --}}
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

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
                                        <label for="example-text-input" class="form-label">Total Payment</label>
                                        <input class="form-control" type="number" value=""
                                            id="example-text-input" placeholder="Enter total payment" name="total">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Remark</label>
                                        <input class="form-control" type="text" value=""
                                            id="example-text-input" placeholder="Enter remark" name="">
                                    </div>


                                    <div class="float-end">
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
