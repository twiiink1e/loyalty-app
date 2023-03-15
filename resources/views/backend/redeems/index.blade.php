@extends('layouts.adminapp')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Redeems</li>
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
                    <h4 class="mb-sm-0 font-size-18">Redeems</h4>

                    <a href="{{ route('redeems.create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            style="float: right; margin-top: -25px"><i data-feather="plus-circle"
                                class="icon-lg"></i>&emsp;Create redeem</button>
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-3">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>



                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Phone</th>
                                <th>Reward</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($redeems as $redeem)
                                <tr>
                                    <td>{{ $redeem->id }}</td>
                                    <td>{{ $redeem->customer->phone }}</td>
                                    <td>{{ $redeem->reward->name }}</td>

                                    @if ($redeem->status == 'success')
                                        <td><a href="{{ route('updateStatus', $redeem->id) }}"
                                                class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                                style="font-size:14px">{{ $redeem->status }}</a>
                                        </td>
                                    @else
                                        <td><a href="{{ route('updateStatus', $redeem->id) }}"
                                                class="btn btn-warning btn-sm btn-rounded waves-effect waves-light"
                                                style="font-size:14px">{{ $redeem->status }}</a>
                                        </td>
                                    @endif

                                    <td>
                                        <form action="{{ route('redeems.destroy', $redeem->id) }}" method="POST">
                                            <a class="btn btn-outline-secondary btn-sm edit" title="View"
                                            href="{{ route('redeems.show', $redeem->id) }}">
                                                <i class=" fas fa-eye"></i>
                                            </a>
                                            
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit"
                                                href="{{ route('redeems.edit', $redeem->id) }}">
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
