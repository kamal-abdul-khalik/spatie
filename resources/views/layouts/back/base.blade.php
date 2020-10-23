<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/back/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/back/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/back/css/style.css">
    <link rel="stylesheet" href="assets/back/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>

    @yield('body')

    <!-- General JS Scripts -->
    <script src="assets/back/modules/jquery.min.js"></script>
    <script src="assets/back/modules/popper.js"></script>
    <script src="assets/back/modules/tooltip.js"></script>
    <script src="assets/back/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/back/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/back/modules/moment.min.js"></script>
    <script src="assets/back/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/back/js/scripts.js"></script>
    <script src="assets/back/js/custom.js"></script>
</body>

</html>