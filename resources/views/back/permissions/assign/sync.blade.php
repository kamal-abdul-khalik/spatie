@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Assign Permission</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sync Role</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('assign.edit', $role) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="role" value="{{ old('role') }}" id="role" class="form-control @error('role') is-invalid @enderror select2">
                                        <option disabled selected>Choose Role</option>
                                        @foreach ($roles as $item)
                                        <option {{ $role->id == $item->id ? 'selected' : '' }}  value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Permission</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="permissions[]" id="permissions" class="form-control @error('permissions') is-invalid @enderror select2" multiple="">
                                        @foreach ($permissions as $permission)
                                        <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-info btn-sm">Sync</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection

@push('jslib')
<script src="{{ asset('assets/back/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
