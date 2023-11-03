<!doctype html>
<html lang="en">

<head>
    <title>:: Iconic :: Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.min.css') }}">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/parsleyjs/css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/summernote/dist/summernote.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">

    @yield('css')
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">
        {{-- Loader --}}
        <div id="loader" class="loader-container">
            <div class="loader-progress"></div>
        </div>
        @include('backend.layouts.header')



        <!-- mani page content body part -->
        <div id="main-content">
            @section('content')

            @show
        </div>

    </div>

    <!-- Javascript -->
    <script src="{{ asset('backend/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('backend/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="{{ asset('backend/vendor/parsleyjs/js/parsley.min.js') }}"></script>
    
    <!-- page js file -->
    <script src="{{ asset('backend/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/vendor/toastr/toastr.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('backend/js/common.js') }}"></script>
    @yield('scripts')
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>

</html>
