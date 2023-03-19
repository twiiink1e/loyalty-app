@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">redeem</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="col-lg-6">
    <div class="card">
        <h5 class="card-header bg-transparent border-bottom text-uppercase">Redeem Information</h5>
        <div class="card-body">
            <p class="mb-2">Customer name:</p>
            <h5 class="font-size-15">{{ $redeem->customer->name }}</h5>

            <p class="mb-2">Reward:</p>
            <h5 class="font-size-15">{{ $redeem->reward->name }}</h5>

            <p class="mb-2">Cost:</p>
            <h5 class="font-size-15">{{ $redeem->reward->point }} pt</h5>
            
            <p class="mb-2">Status:</p>
            <h5 class="font-size-15">{{ $redeem->status }}</h5>

            <p class="mb-2">Redeem date:</p>
            <h5 class="font-size-15">{{ $redeem->created_at }} </h5>


            <a class="btn btn-primary mt-3" href="{{ route('redeems.index') }}">Back</a>
        </div>
    </div>
</div><!-- end col -->

@endsection