@extends('layouts.admin.app')


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
                            <h4>Edit Permission</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.edit', $permission) }}" method="post">
                                @csrf
                                @method('PUT')

                                @include('admin.permissions.permission.partials.form-control')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
