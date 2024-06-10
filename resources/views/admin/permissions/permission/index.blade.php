@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/datatables/datatables.min.css">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permissions</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create new Permissions</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.create') }}" method="post">
                                @csrf

                                @include('admin.permissions.permission.partials.form-control', [
                                    'submit' => 'Create',
                                ])
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Table of Permissions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Guard Name</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $index => $permission)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                                <td>{{ $permission->created_at->format('d F Y') }}</td>
                                                <td>
                                                    <a href="{{ route('permissions.edit', $permission) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <!-- Page Specific JS File -->
    <script src="/assets/admin/modules/datatables/datatables.min.js"></script>
    <script src="/assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/admin/js/page/modules-datatables.js"></script>
@endpush
