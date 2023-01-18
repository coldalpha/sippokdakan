<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <!-- Title -->
    <title>{{ $title }} - POKDAKAN</title>

    <!-- Required Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Bootstrap HTML template and UI kit by Erilisdesign" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('/assetsFE/vendor/bootstrap/dist/css/bootstrap.min.css') }} "
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assetsFE/vendor/font-awesome/css/all.min.css') }} " type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assetsFE/vendor/themify-icons/css/themify-icons.css') }} "
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assetsFE/vendor/slick/slick.min.css') }} " type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assetsFE/vendor/featherlight/featherlight.min.css') }} "
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assetsFE/vendor/featherlight/featherlight.gallery.min.css') }} "
        type="text/css" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('/assetsFE/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assetsFE/css/utilities.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/assetsFE/css/custom.css') }}" />

    <link href="{{ asset('/assets/css/icons.css ') }} " rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>

    </style>

</head>

<body data-spy="scroll" data-target="#navbarCollapse">
    <!-- Loader -->
    <div class="loader bg-dark">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Site navigation -->
    @include('frontEnd.layouts.vlFeNavbar')

    <!-- Button - Back to top -->
    <a href="#"
        class="
        btn-back-to-top
        scrollto
        btn btn-icon btn-primary
        shadow-light
        mb-4
        mr-4
      "
        tabindex="-1">
        <i class="fas fa-chevron-up btn-icon-inner"></i>
    </a>
    <!-- Website Content -->
    @yield('content')

    <!-- Footer -->
    @include('frontEnd.layouts.vlFeFooter')

    <!-- Libs JS -->
    <script src="{{ asset('/assetsFE/vendor/jquery/dist/jquery.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/popper.js/dist/popper.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/jquery-validation/dist/jquery.validate.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/jquery-form/dist/jquery.form.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/imagesloaded/imagesloaded.pkgd.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/isotope/dist/isotope.pkgd.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/featherlight/featherlight.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/featherlight/jquery.detect_swipe.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/featherlight/featherlight.gallery.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/jquery.scrollTo/jquery.scrollTo.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/jQuery.countdown/dist/jquery.countdown.min.js') }} "></script>
    <script src="{{ asset('/assetsFE/vendor/typed.js/typed.min.js') }} "></script>
    <!-- Theme JS -->
    <script src="{{ asset('/assetsFE/js/main.js') }}"></script>
    <!-- google maps api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async
        defer></script>
    {{-- <script src="{{ asset('/assetsFE/plugins/gmaps/map-custom-script.js') }}"></script> --}}
    <script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>
    {{-- <script src="https://pagination.js.org/dist/2.1.5/pagination.min.js"></script> --}}

</body>

</html>
