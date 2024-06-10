@extends('layouts.back.auth')

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
            <img src="/assets/admin/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Forgot Password</h4>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        Link reset password telah dikirim ke email anda
                    </div>
                @endif
                <form action="/forgot-password" method="POST" class="needs-validation" novalidate="">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Kirim link lupa password
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="simple-footer">
            Copyright &copy; {{ config('app.name') }}
        </div>
    </div>
@endsection
