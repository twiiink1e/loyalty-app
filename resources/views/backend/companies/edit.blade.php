@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Company Information</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Compnay Information</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Input</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('companies.update', $company->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <input class="form-control" type="text" value="{{ Auth::user()->id }}"
                                        id="example-text-input" placeholder="Enter your company" name="user_id" hidden>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Company Name</label>
                                        <input class="form-control" type="text" value="{{ $company->name }}"
                                            id="example-text-input" placeholder="Enter your company" name="name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Telephone</label>
                                        <input class="form-control" type="tel" value="{{ $company->phone }}"
                                            id="example-tel-input" placeholder="Enter your company number" name="phone">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Address</label>
                                        <input class="form-control" type="text" value="{{ $company->address }}"
                                            id="example-text-input" placeholder="Enter your company address" name="address">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Company Logo</label>
                                        <input class="form-control" type="file" id="example-text-input"
                                            name="logo">

                                            <label for="" class="form-label">Current Logo</label><br>
                                            <img src="/logos/{{ $company->logo }}" width="300px">
                                        </div>
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
