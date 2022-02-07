<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" href='{{asset("assets/img/ananda.jpg")}}'>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @yield('title')
    <meta content="La Ste ANANDA est une entreprise de Travaux Publics, de Bâtiments et de Génie Civil spécialisée dans la construction des Routes, Ponts, Ouvrages d’Arts et Hydrauliques. Elle est aussi spécialisée dans la Gestion de l’environnement." name="description">
    <meta content="Travaux Publics, Bâtiments, Génie Civil, Ouvrages d’Arts, Hydrauliques, Gestion de l’environnement" name="keywords">
    <meta property="og:url" content='https://ananda.hilexpertiz.com/login'>
    <meta property="og:type" content="website">
    <meta property="og:title" content="ANANDA SARL">
    <meta property="og:description" content="La Ste ANANDA est une entreprise de Travaux Publics, de Bâtiments et de Génie Civil spécialisée dans la construction des Routes, Ponts, Ouvrages d’Arts et Hydrauliques. Elle est aussi spécialisée dans la Gestion de l’environnement.">
    <meta property="og:image" content='{{asset("assets/img/ananda.jpg")}}'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicons -->
    <link href='{{asset("assets/img/ananda.jpg")}}' rel="info">
    <link href='{{asset("assets/img/apple-touch-icon.png")}}' rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href='{{asset("assets/vendor/animate.css/animate.min.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/bootstrap-icons/bootstrap-icons.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/boxicons/css/boxicons.min.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/fontawesome-free/css/all.min.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/glightbox/css/glightbox.min.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/remixicon/remixicon.css")}}' rel="stylesheet">
    <link href='{{asset("assets/vendor/swiper/swiper-bundle.min.css")}}' rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href='{{asset("assets/css/style.css")}}'>

    <!-- Google Fonts -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'> -->

    <!-- =======================================================
  * Template Name: Medilab - v4.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"></i> <a href="mailto:ananda.btp@yahoo.com">ananda.btp@yahoo.com</a>
                <i class="bi bi-whatsapp"></i> <a href="https://wa.me/22890058408" target="_blanck">+228 9005 8408</a>
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="https://www.facebook.com/ste.ananda/" target="_blanck" class="facebook"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <!-- <h1 class="logo me-auto"><a href="#">CHI</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ url('/') }}" class="logo me-auto"><img src='{{asset("assets/img/ananda.jpg")}}' alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="{{url('/')}}">Accueil</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('en_savoir_plus') }}">En savoir plus</a></li>
                    <li><a class="nav-link scrollto" href="https://wa.me/22890058408">Support</a></li>
                    <!-- Authentication Links -->
                    @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                    </li>

                    @else
                    @can('manage-users')
                    <li class="dropdown"><a href="#"><i class="fa fa-globe" style="color: #004aad;"> </i> <span>Notifications</span> <span class="label label-danger">{{count(Auth::user()->unreadNotifications)}}</span></a>
                        <ul>
                            @foreach(Auth::user()->unreadNotifications as $notification)
                            @include('layouts.notification.'.snake_case(class_basename($notification->type)))
                            @endforeach
                        </ul>
                    </li>
                    @endcan
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @can('manage-users')
                            <li>
                                <a href="#">
                                    Gestion des RDV
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    User Management
                                </a>

                            </li>
                            @endcan
                            <li>
                                <a href="#">
                                    Tableau de bord
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Transactions
                                </a>
                            </li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Se deconnecter') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#" class="appointment-btn scrollto"><span class="d-none d-md-inline">Prendre un</span> RDV</a>

        </div>
    </header><!-- End Header -->

    <main id="main">
        @include('partials.alerts')
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>ANANDA SARL</h3>
                        <p>
                            Unknow<br>
                            Lomé-Togo<br><br>
                            <strong>Téléphone:</strong> +228 90058408<br>
                            <strong>Email:</strong> ananda.btp@yahoo.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Liens Utiles</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Nos Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Nos Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 ">
                        <!-- <h4>Rejoignez notre notre communauté</h4> -->
                        <!-- Begin Mailchimp Signup Form -->

                        <!--End mc_embed_signup-->
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; 2021 <strong><span>ANANDA SARL</span></strong>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
                    <!-- <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="https://wa.me/22890058408" target="_blanck" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                <a href="https://www.facebook.com/ste.ananda/" class="facebook"><i class="bx bxl-facebook"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}'></script>
    <script src='{{asset("assets/vendor/glightbox/js/glightbox.min.js")}}'></script>
    <script src='{{asset("assets/vendor/purecounter/purecounter.js")}}'></script>
    <script src='{{asset("assets/vendor/swiper/swiper-bundle.min.js")}}'></script>

    <!-- Template Main JS File -->
    <!-- <script src="assets/js/main.js"></script> -->
    <script src='{{asset("assets/js/main.js")}}'></script>

    @yield("script")
</body>

</html>