@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Announcement Information</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Announcement Information</li>
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
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
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

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Reward</label>
                                                <select class="form-select form-select-lg mb-3" name="reward_id"
                                                    aria-label=".form-select-lg example" required>
                                                    <option value="">Choose reward</option>
                                                    @foreach ($rewards as $reward)
                                                        <option value="{{ $reward->id }}" {{ $announcement->reward_id == $reward->id ? 'selected' : '' }}>{{ $reward->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Expire Date</label>
                                                <input type="date" class="form-control" id="datePickerId" name="expire" value="{{ $announcement->expire }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Topic</label>
                                        <input class="form-control" type="text" value="{{ $announcement->topic }}" id="example-text-input"
                                            placeholder="Enter announcement topic" name="topic" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Description</label>
                                        <input class="form-control" type="text" value="{{ $announcement->description }}" id="example-tel-input"
                                            placeholder="Enter announcement description" name="description">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Thumbnail</label>
                                        <input class="form-control mb-4" type="file" value="" id="example-tel-input" name="thumbnail">

                                    <label for="" class="form-label">Current Image</label><br>
                                        <img src="/thumbnails/{{ $announcement->thumbnail }}" width="300px">
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
