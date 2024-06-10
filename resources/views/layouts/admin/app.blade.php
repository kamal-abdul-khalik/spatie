@extends('layouts.admin.base')

@section('body')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <x-back.navbar></x-back.navbar>
            <x-back.sidebar></x-back.sidebar>

            @yield('content')

            <x-back.footer></x-back.footer>
        </div>
    </div>
@endsection
