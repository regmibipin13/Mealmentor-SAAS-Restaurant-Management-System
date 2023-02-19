<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../admin/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('/admin/img/favicon.png') }}">
    <title>
        @yield('title', 'Admin Panel')
    </title>
    <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/admin/css/argon-dashboard.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')
    @stack('after_styles')
</head>

<body class="g-sidenav-show bg-gray-100">

    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('admin.includes.sidebar')
    <main class="main-content position-relative border-radius-lg" id="app">
        @include('admin.includes.navbar')
        <!-- End Navbar -->
        @yield('content')
    </main>



    <!--   Core JS Files   -->
    {{-- <script src="{{ asset('/admin/js/core/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/admin/js/core/bootstrap.min.js') }}"></script> --}}

    <!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
    <script src="{{ asset('/admin/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('/admin/js/plugins/Chart.extension.js') }}"></script>

    <!-- Control Center for Argon Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/admin/js/argon-dashboard.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @yield('js')
    @stack('after_scripts')
</body>

</html>
