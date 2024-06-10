@extends('layouts.admin.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashborad</h1>
            </div>
            @if (!Auth::user()->hasAnyRole($roles))
                <div class="alert alert-info alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Info</div>
                        Untuk dapat menggunakan fitur posting berita di <strong> {{ config('app.name') }}</strong> silahkan
                        request Role and Permission dengan mengklik tombol request role <a class="btn btn-sm btn-warning"
                            href="https://wa.wizard.id/14aa7d"> Request Role</a>
                    </div>
                </div>
            @endif

            <div class="section-body">

                Hay {{ Auth::user()->name }}

            </div>
        </section>
    </div>
@endsection
