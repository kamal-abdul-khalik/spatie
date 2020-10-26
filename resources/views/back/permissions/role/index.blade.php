@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Roles</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create new Role</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.create') }}" method="post">
                            @csrf

                            @include('back.permissions.role.partials.form-control', ['submit' => 'Create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Table of Roles</h4>
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
                                        <th>Act</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>{{ $role->created_at->format('d F Y') }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-info">
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

@push('jslib')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/back/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/back/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/back/js/page/modules-datatables.js') }}"></script>
@endpush