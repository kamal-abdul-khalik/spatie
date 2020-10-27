@extends('layouts.back.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Profile</h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile Anda</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('profile.edit') }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? Auth::user()->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? Auth::user()->username }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::user()->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Update Pofile</button>

                            </form>
                            <div class="mt-3">
                                <span class="text-warning"><i class="fa fa-info-circle"></i> <strong>Hati-Hati </strong>, sebelum mengganti email pastikan email yang anda inputkan aktif dan valid, jika tidak maka sementara akun ini dibekukan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection