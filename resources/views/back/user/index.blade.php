@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('add_users')
                        <h4><a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">New User</a></h4>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}
                                            @can('edit_users', 'delete_users')
                                            <div class="table-links">
                                                <a href="{{ route('users.edit', $user) }}">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="{{ route('users.destroy', $user) }}" onclick="event.preventDefault();document.getElementById('destroy').submit();" class="text-danger">Trash</a>
                                                <form id="destroy" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                            @endcan
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->pluck('name') }}</td>
                                        <td>{{ $user->created_at->format('d F Y') }}</td>
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