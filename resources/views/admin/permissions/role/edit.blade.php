@extends('layouts.admin.app')


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
                            <h4>Edit Role</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.edit', $role) }}" method="post">
                                @csrf
                                @method('PUT')

                                @include('admin.permissions.role.partials.form-control')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
