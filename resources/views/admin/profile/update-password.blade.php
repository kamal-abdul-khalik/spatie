@extends('layouts.admin.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Update Password</h1>
            </div>

            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Password Anda</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('password.edit') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="current_password" class="d-block">Password Lama</label>
                                        <input id="current_password" type="password"
                                            class="form-control pwstrength @error('current_password') is-invalid @enderror"
                                            name="current_password">
                                        @error('current_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="d-block">Password Baru</label>
                                        <input id="password" type="password"
                                            class="form-control pwstrength @error('password') is-invalid @enderror"
                                            data-indicator="pwindicator" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="d-block">Password Confirmation</label>
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Update Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="/assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="/assets/admin/js/page/auth-register.js"></script>
@endpush
