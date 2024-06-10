<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="/assets/admin/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/admin/modules/fontawesome/css/all.min.css">

        <!-- CSS Libraries -->
        @yield('css')
        <!-- Template CSS -->
        <link rel="stylesheet" href="/assets/admin/css/style.css">
        <link rel="stylesheet" href="/assets/admin/css/components.css">
        <link rel="stylesheet" href="/assets/admin/modules/izitoast/css/iziToast.min.css">
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
        <script src="/assets/admin/modules/jquery.min.js"></script>
        <script src="/assets/admin/modules/popper.js"></script>
        <script src="/assets/admin/modules/tooltip.js"></script>
        <script src="/assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="/assets/admin/modules/moment.min.js"></script>
        <script src="/assets/admin/js/stisla.js"></script>
        <script src="/assets/admin/modules/izitoast/js/iziToast.min.js"></script>

        <!-- JS Libraies -->
        @stack('js')

        <!-- Template JS File -->
        <script src="/assets/admin/js/scripts.js"></script>
        <script src="/assets/admin/js/custom.js"></script>
        <script>
            @if (Session::has('success'))
                iziToast.success({
                    title: 'Success',
                    message: "{{ Session::get('success') }}",
                    position: 'topRight'
                })
            @endif
            @if (Session::has('info'))
                iziToast.info({
                    title: 'Info',
                    message: "{{ Session::get('info') }}",
                    position: 'topRight'
                })
            @endif
            @if (Session::has('error'))
                iziToast.error({
                    title: 'Error',
                    message: "{{ Session::get('error') }}",
                    position: 'topRight'
                })
            @endif
            @if (Session::has('warning'))
                iziToast.warning({
                    title: 'Warning',
                    message: "{{ Session::get('warning') }}",
                    position: 'topRight'
                })
            @endif
        </script>
    </body>

</html>
