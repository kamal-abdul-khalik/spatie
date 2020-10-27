@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/select2/dist/css/select2.min.css') }}">
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
                        <h4>Sync Roles for {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permissionUsers.edit', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email User</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="email" value="{{ old('email') ?? $user->email }}" id="email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Roles</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="roles[]" value="{{ old('roles') }}" id="roles" class="form-control @error('roles') is-invalid @enderror select2" multiple>
                                        @foreach ($roles as $role)
                                            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>    
                                    @error('roles')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary btn-sm">Assign</button>
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
