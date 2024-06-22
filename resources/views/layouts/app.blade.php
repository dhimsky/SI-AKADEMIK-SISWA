<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SIAKAD | @yield('tittle')</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('/') }}assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('/') }}assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('/') }}assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('/') }}assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" >
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('layouts.header')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('layouts.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">@yield('tittle')</h1>
            </div>
            @yield('content')
            <!-- END PAGE CONTENT-->
            <!-- FOOTER-->
            @include('layouts.footer')
            <!-- END FOOTER-->
        </div>
    </div>

    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ asset('/') }}assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('/') }}assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('/') }}assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('/') }}assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('/') }}assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('/') }}assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('/') }}assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/js/scripts/form-plugins.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/jquery-knob/dist/jquery.knob.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
</body>

</html>