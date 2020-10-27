@extends('layouts.back.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Verifikasi Email</h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h4>Verifikasi email <span class="text-primary">{{ Auth::user()->email }}</span> </h4>
                        </div>
                        <div class="card-body">

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Email sudah terkirim ke <strong class="text-primary">{{ Auth::user()->email }}</strong>
                            </div>
                            @endif

                            <form action="/email/verification-notification" method="post" class="mb-3">
                                @csrf

                                @if (session('status'))
                                <button class="btn btn-sm btn-primary" hidden>Kirim ulang verifikasi</button>
                                @else
                                
                            Silahkan verifikasi email Anda untuk mengaktifkan akun, jika belum menerima email verifikasi, silahkan klik tombol kirim ulang verifikasi.

                                <button class="btn btn-sm btn-primary">Kirim ulang verifikasi</button>
                                @endif
                            </form>
                            <small class="text-danger"><i class="fa fa-info-circle"></i> Pastikan Anda memeriksa folder spam pada email Anda jika email tidak masuk dalam folder email Anda</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection