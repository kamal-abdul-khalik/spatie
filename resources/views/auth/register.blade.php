@extends('layouts.back.auth')

@section('content')
    <div class="col-12 col-sm-8 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="login-brand">
            <img src="/assets/admin/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Register</h4>
            </div>

            <div class="card-body">

                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" autofocus value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
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
                        <div class="form-group col-6">
                            <label for="password_confirmation" class="d-block">Password Confirmation</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Register
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <div class="mt-5 text-muted text-center">
            Do you have an account? <a href="/login">Login</a>
        </div>

        <div class="simple-footer">
            Copyright &copy; {{ config('app.name') }}
        </div>
    </div>
@endsection

@push('js')
    <script src="/assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="/assets/admin/js/page/auth-register.js"></script>
@endpush
