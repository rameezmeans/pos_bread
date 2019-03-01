<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="wrapper ">

        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

              Tip 2: you can also add an image using data-image tag
          -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Creative Tim
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item @if($type == 'dashboard') active @endif  ">
                        <a class="nav-link" href="./home">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item @if($type == 'companies') active @endif ">
                        <a class="nav-link" href="#">
                            <i class="material-icons">content_paste</i>
                            <p>Companies</p>
                        </a>

                        <ul class="nav nav-second-level collapse" style="height: 0px;">
                            <li><a href="{{ url('') }}/companies/create">Add Company</a></li>

                            <li><a href="{{ url('') }}/companies">List Companies</a></li>

                        </ul>

                    </li>
                    {{--<li class="nav-item ">--}}
                        {{--<a class="nav-link" href="./tables.html">--}}
                            {{--<i class="material-icons">content_paste</i>--}}
                            {{--<p>Table List</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item ">--}}
                        {{--<a class="nav-link" href="./typography.html">--}}
                            {{--<i class="material-icons">library_books</i>--}}
                            {{--<p>Typography</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item ">--}}
                        {{--<a class="nav-link" href="./icons.html">--}}
                            {{--<i class="material-icons">bubble_chart</i>--}}
                            {{--<p>Icons</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item ">--}}
                        {{--<a class="nav-link" href="./map.html">--}}
                            {{--<i class="material-icons">location_ons</i>--}}
                            {{--<p>Maps</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item ">--}}
                        {{--<a class="nav-link" href="./notifications.html">--}}
                            {{--<i class="material-icons">notifications</i>--}}
                            {{--<p>Notifications</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <!-- <li class="nav-item active-pro ">
                          <a class="nav-link" href="./upgrade.html">
                              <i class="material-icons">unarchive</i>
                              <p>Upgrade to PRO</p>
                          </a>
                      </li> -->
                </ul>
            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            @yield('content')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>




        <script>
            $(document).ready(function() {
                $('table').DataTable();
            } );
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
</body>
</html>
