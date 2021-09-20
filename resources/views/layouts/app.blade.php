<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Ananda - plateforme de gestion des engins</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href='{{asset("admin_assets/plugins/toaster/toastr.min.css")}}' rel="stylesheet" />
    <link href='{{asset("admin_assets/plugins/nprogress/nprogress.css")}}' rel="stylesheet" />
    <link href='{{asset("admin_assets/plugins/flag-icons/css/flag-icon.min.css")}}' rel="stylesheet" />
    <link href='{{asset("admin_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css")}}' rel="stylesheet" />
    <link href='{{asset("admin_assets/plugins/ladda/ladda.min.css")}}' rel="stylesheet" />
    <link href='{{asset("admin_assets/plugins/select2/css/select2.min.css")}}' rel="stylesheet" />
    <link href='{{asset("admin_assets/plugins/daterangepicker/daterangepicker.css")}}' rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href='{{asset("admin_assets/css/sleek.css")}}' />



    <!-- FAVICON -->
    <link rel="icon" href='{{asset("admin_assets/img/lgchi.png")}}' />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src='{{asset("admin_assets/plugins/nprogress/nprogress.js")}}'></script>
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="">
                        <img src='{{asset("admin_assets/img/lgchi.png")}}' class="brand-icon" alt="" width="40" height="40">
                        <span class="brand-name">Admin Dashbord</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="has-sub active expand">
                            <a class="sidenav-item-link" href="{{route('dashboard')}}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href='{{route("utilisateurs.get")}}'>
                                <i class="mdi mdi-account-group"></i>
                                <span class="nav-text">Utilisateurs</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href='{{route("engins")}}'>
                                <i class="mdi mdi-car"></i>
                                <span class="nav-text">Engins</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href=''>
                                <i class="mdi mdi-alarm-light"></i>
                                <span class="nav-text">Pannes</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href=''>
                                <i class="mdi mdi-alert"></i>
                                <span class="nav-text">Niveau d'huile</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href=''>
                                <i class="mdi mdi-crosshairs-gps"></i>
                                <span class="nav-text">Emplacement des engins</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <hr class="separator" />

                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">

                    </div>
                </div>
            </div>
        </aside>



        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- search form -->
                    <div class="search-form d-none d-lg-inline-block">
                        <div class="input-group">
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <input type="text" name="query" id="search-input" class="form-control" placeholder="Recherche..." autofocus autocomplete="off" />
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <!-- Github Link Button -->
                            <li class="github-link mr-3">
                                <a class="btn btn-outline-secondary btn-sm" href="https://hilexpertiz.com/" target="_blank">
                                    <span class="d-none d-md-inline-block mr-2">hilexpertiz</span>
                                </a>

                            </li>
                            <li class="dropdown notifications-menu">
                                <button class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i> <small style="color: red;"></small>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">Notifications</li>
                                    <li>

                                        <a href="">
                                            <i class="mdi mdi-calendar-blank"></i> - Event
                                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> </span>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src='{{asset("admin_assets/img/avatar.png")}}' class="user-image" alt="User Image" />
                                    <small class="pt-1">{{Auth::user()->name}}</small>
                                    <span class="d-none d-lg-inline-block"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src='{{asset("admin_assets/img/avatar.png")}}' class="img-circle" alt="User Image" />
                                        <div class="d-inline-block">
                                            <small class="pt-1">{{Auth::user()->name}}</small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account"></i> Mon profile
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Se deconnecter') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>


            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
                @yield('modal')
            </div>

            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year">2019</span>
                        <a class="text-primary" href="https://hilexpertiz.com/" target="_blank">HilExpertiz</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src='{{asset("admin_assets/plugins/jquery/jquery.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/toaster/toastr.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/slimscrollbar/jquery.slimscroll.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/charts/Chart.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/ladda/spin.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/ladda/ladda.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/jquery-mask-input/jquery.mask.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/select2/js/select2.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/daterangepicker/moment.min.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/daterangepicker/daterangepicker.js")}}'></script>
    <script src='{{asset("admin_assets/plugins/jekyll-search.min.js")}}'></script>
    <script src='{{asset("admin_assets/js/sleek.js")}}'></script>
    <script src='{{asset("admin_assets/js/chart.js")}}'></script>
    <script src='{{asset("admin_assets/js/date-range.js")}}'></script>
    <script src='{{asset("admin_assets/js/map.js")}}'></script>
    <script src='{{asset("admin_assets/js/custom.js")}}'></script>
</body>

</html>