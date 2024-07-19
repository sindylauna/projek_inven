<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icons" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/vendor/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
     
    @yield('styles')
</head>

<body>

    <!--************
        Main wrapper start
    *************-->
    <div id="main-wrapper">

        <!--************
            Nav header start
        *************-->
        @include('layouts.admin.navbar')
        <!--************
            Nav header end
        *************-->

        <!--************
            Header start
        *************-->

        <!--************
            Header end ti-comment-alt
        *************-->

        <!--************
            Sidebar start
        *************-->
        @include('layouts.admin.sidebar')
        <!--************
            Sidebar end
        *************-->

        <!--************
            Content body start
        *************-->
        <div class="content-body">
            {{-- row --}}
            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('content')
            </div>
        </div>
        <!--************
            Content body end
        *************-->


        <!--************
            Footer start
        *************-->
        @include('layouts.admin.footer')
        <!--************
            Footer end
        *************-->

        <!--************
           Support ticket button start
        *************-->

        <!--************
           Support ticket button end
        *************-->


    </div>
    <!--************
        Main wrapper end
    *************-->

    <!--************
        Scripts
    *************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>


    <script src="{{ asset('assets/js/dashboard/dashboard-2.js') }}"></script>
    @include('sweetalert::alert')
    <!-- Circle progress -->
    @yield('js')
    @stack('scripts')

</body>

</html>
