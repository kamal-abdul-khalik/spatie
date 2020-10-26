<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/back/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    @yield('css_lib')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/back/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/modules/izitoast/css/iziToast.min.css') }}">
    <!-- Start GA -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script> --}}
    <!-- /END GA -->
</head>

<body>

    @yield('body')

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/back/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/back/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/back/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/back/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/back/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/back/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/back/modules/izitoast/js/iziToast.min.js') }}"></script>

    <!-- JS Libraies -->
    @stack('jslib')

    <!-- Template JS File -->
    <script src="{{ asset('assets/back/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/back/js/custom.js') }}"></script>
    <script>
        @if(Session::has('success'))
        iziToast.success({
            title: 'Success',
            message: "{{Session::get('success')}}",
            position: 'topRight'
        })
        @endif
        @if(Session::has('info'))
        iziToast.info({
            title: 'Info',
            message: "{{Session::get('info')}}",
            position: 'bottomRight'
        })
        @endif
        @if(Session::has('error'))
        iziToast.error({
            title: 'Error',
            message: "{{Session::get('error')}}",
            position: 'topRight'
        })
        @endif
        @if(Session::has('warning'))
        iziToast.warning({
            title: 'Warning',
            message: "{{Session::get('warning')}}",
            position: 'topRight'
        })
        @endif
    </script>
</body>

</html>