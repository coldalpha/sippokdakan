<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/simplebar/css/simplebar.css') }} " rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css ') }} " rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/metismenu/css/metisMenu.min.css ') }} " rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/assets/css/bootstrap.min.css ') }} " rel="stylesheet" />
    <link href="{{ asset('/assets/css/bootstrap-extended.css ') }} " rel="stylesheet" />
    <link href="{{ asset('/assets/css/style.css ') }} " rel="stylesheet" />
    <link href="{{ asset('/assets/css/icons.css ') }} " rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }} " rel="stylesheet" />

    <!-- CSS ku-->
    <link href="{{ asset('assets/css/coba.css') }} " rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('/assets/css/dark-theme.css') }} " rel="stylesheet" />
    <link href="{{ asset('/assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/header-colors.css') }}" rel="stylesheet" />

    <!-- maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    {{-- Data Tables --}}
    <link href="{{ asset('/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <title>{{ $title }} - POKDAKAN</title>

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('/assets/js/trix.js') }}"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- SweatAlert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        @include('admin.layouts.vlHeader')
        <!--end top header-->

        <!--start sidebar -->
        @include('admin.layouts.vlSidebar')
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            @yield('content')

        </main>
        <!--end page main-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        @include('admin.layouts.vlSwitcher')
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/assets/js/pace.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/form-select2.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/js/table-datatable.js') }}"></script>
    <!--app-->
    <script src="{{ asset('/assets/js/app.js') }}"></script>

    <!--Modal: maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvtEWZ71MgdB_u_n1p0PEh7VTKcEpM6KE&callback=initMap">
    </script>


</body>

</html>
