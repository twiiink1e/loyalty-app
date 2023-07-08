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
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Input</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mt-2 mb-0">
                        <i class="mdi mdi-block-helper label-icon"></i>
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mt-2 mb-0"
                        role="alert">
                        <i class="mdi mdi-block-helper label-icon"></i><strong>Error: </strong> {{ $success }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('rewards.update', $reward->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">

                                <select class="form-select form-select-lg mb-3" name="company_id"
                                    aria-label=".form-select-lg example" hidden>
                                    {{-- <option value="">Choose company</option> --}}
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>

                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Reward Name</label>
                                    <input class="form-control" type="text" value="{{ $reward->name }}"
                                        id="example-text-input" placeholder="Enter reward" name="name">
                                </div>

                                <div class="mb-3">
                                    <label for="example-tel-input" class="form-label">Point</label>
                                    <input class="form-control" type="number" value="{{ $reward->point }}"
                                        id="example-tel-input" placeholder="Enter point" name="point">
                                </div>

                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Remark</label>
                                    <input class="form-control" type="text-area" value="{{ $reward->remark }}"
                                        id="example-text-input" placeholder="Enter remark" name="remark">
                                </div>

                                <div class="mb-3">
                                    <label for="example-tel-input" class="form-label">Image</label>
                                    <input class="form-control mb-4" type="file" value="" id="example-tel-input" name="image">

                                    <label for="" class="form-label">Current Image</label><br>
                                    <img src="/rewardImages/{{ $reward->image }}" width="300px">
                                </div>

                                <div class="float-end mt-2">
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
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
