{{-- @extends('layouts.adminapp')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Payment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header bg-transparent border-bottom text-uppercase">Payment Information</h5>
        <div class="card-body">
            <p class="mb-2">Customer name:</p>
            <h5 class="font-size-15">{{ $payment->customer->name }}</h5>

            <p class="mb-2">Customer phone number:</p>
            <h5 class="font-size-15">{{ $payment->customer->phone }}</h5>

            <p class="mb-2">Customer address:</p>
            <h5 class="font-size-15">{{ $payment->customer->address }}</h5>

            <p class="mb-2">Total Payment:</p>
            <h5 class="font-size-15">{{ $payment->total }} $</h5>

            <p class="mb-2">Payment date:</p>
            <h5 class="font-size-15">{{ $payment->created_at }} </h5>


            <a class="btn btn-primary mt-3" href="{{ route('payments.index') }}">Back</a>
        </div>
    </div>


@endsection --}}


<!-- Static Backdrop Modal -->

<div class="modal fade" id="staticBackdropl{{ $payment->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Payment Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Customer name:</p>
                <h5 class="font-size-15">{{ $payment->customer->name }}</h5>

                <p class="mb-2">Customer phone number:</p>
                <h5 class="font-size-15">{{ $payment->customer->phone }}</h5>

                <p class="mb-2">Customer address:</p>
                <h5 class="font-size-15">{{ $payment->customer->address }}</h5>

                <p class="mb-2">Total Payment:</p>
                <h5 class="font-size-15">{{ $payment->total }} $</h5>

                <p class="mb-2">Payment date:</p>
                <h5 class="font-size-15">{{ $payment->created_at }} </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
