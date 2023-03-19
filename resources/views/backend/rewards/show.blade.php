@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Reward</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="col-lg-6">
    <div class="card">
        <h5 class="card-header bg-transparent border-bottom text-uppercase">Reward Information</h5>
        <div class="card-body">

            <p class="mb-2">Reward:</p>
            <h5 class="font-size-15">{{ $reward->name }}</h5>

            <p class="mb-2">Point:</p>
            <h5 class="font-size-15">{{ $reward->point }} pt</h5>

            <p class="mb-2">Remark:</p>
            <h5 class="font-size-15">{{ $reward->remark }} </h5>

            <p class="mb-2">Current image:</p>
            <img src="/rewardImages/{{ $reward->image }}" width="200px">

        </div>
        <a class="btn btn-primary mt-3" href="{{ route('rewards.index') }}">Back</a>

    </div>
</div><!-- end col -->

@endsection