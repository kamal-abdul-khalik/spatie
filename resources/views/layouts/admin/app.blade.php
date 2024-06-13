@extends('layouts.admin.base')

@section('body')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <x-admin.navbar></x-admin.navbar>
            <x-admin.sidebar></x-admin.sidebar>

            @yield('content')

            <x-admin.footer></x-admin.footer>
        </div>
    </div>
@endsection
