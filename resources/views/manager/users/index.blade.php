@extends('layouts.managerapp')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manager</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                    {{-- <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        style="float: right; margin-top: -25px"><i data-feather="plus-circle"
                            class="icon-lg"></i>&emsp;Create user</button>
                </a> --}}

                    <div class="mt-4">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show"
                                role="alert">
                                <i class="mdi mdi-check-all label-icon"></i><strong>Success</strong> - {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="card-body">

                    <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                {{-- <th style="width: 100px">Image</th> --}}
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    @if($user->type == 'admin')
                                    <td class="bg-soft-success"> Merchant</td>
                                    @else
                                    <td class="bg-soft-warning">Customer</td>
                                    @endif
                                    {{-- <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                            <a class="btn btn-outline-secondary btn-sm edit" title="View"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdropl{{ $user->id }}"
                                                style="cursor: pointer">
                                                <i class=" fas fa-eye"></i>
                                            </a>

                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit"
                                                href="{{ route('users.edit', $user->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                class="btn btn-outline-secondary btn-sm btn-default show-alert-delete-box "
                                                data-toggle="tooltip" title='Delete'><i
                                                    class='fas fa-trash-alt'></i></button>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
