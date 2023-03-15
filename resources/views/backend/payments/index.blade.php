@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Payments</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Datatable</h4> --}}
                    <h4 class="mb-sm-0 font-size-18">Payments</h4>

                    <a href="{{ route('payments.create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            style="float: right; margin-top: -25px"><i data-feather="plus-circle"
                                class="icon-lg"></i>&emsp;Create payment</button>
                    </a>

                    <div class="mt-4">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>

                </div>


                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Phone</th>
                                <th>Name</th>
                                <th>Total ($)</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->customer->name }}</td>
                                    <td>{{ $payment->customer->phone }}</td>
                                    <td>{{ $payment->total }}</td>
                                    {{-- <td>{{ $payment->remark }}</td> --}}
                                    <td>
                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                                            <a class="btn btn-outline-secondary btn-sm edit" title="View" href="{{ route('payments.show', $payment->id) }}">
                                                <i class=" fas fa-eye"></i>
                                            </a>

                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit"
                                                href="{{ route('payments.edit', $payment->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                class="btn btn-outline-secondary btn-sm btn-default show-alert-delete-box "
                                                data-toggle="tooltip" title='Delete'><i
                                                    class='fas fa-trash-alt'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
