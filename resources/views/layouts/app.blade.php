<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from Student Learning-bootstrap.frontendmatter.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2019 21:22:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>laravel</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{URL::asset('assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{URL::asset('assets/vendor/fix-footer.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{URL::asset('assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{URL::asset('assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{URL::asset('assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/preloader.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{URL::asset('assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/app.rtl.css')}}" rel="stylesheet">

    <link type="text/css" href="{{URL::asset('assets/css/plyr.css')}}" rel="stylesheet">
   

    <style>
            .test-option-true{
                background-color: green !important;
                color: white;
            }
            .test-option-false{
                background-color: red !important;
                color: white;
            }
            </style>



</head>

<body class="layout-navbar-mini-fixed-bottom">

































    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
            <div class="mdk-header__content">

                <div data-primary class="navbar navbar-expand-sm navbar-dark bg-dark p-0" id="default-navbar">
                    <div class="container">

                        <!-- Navbar Brand -->
                        <a href="index.html" class="navbar-brand">
                            <img class="navbar-brand-icon" src="{{URL::asset('assets/images/logo/white-100%402x.png')}}" width="30" alt="Student Learning">
                            <span class="d-none d-md-block">Student Learning</span>
                        </a>

                        <!-- Main Navigation -->
                        <ul class="nav navbar-nav ml-auto d-none d-sm-flex">
                            @auth
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Modules</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('results.index') }}">Results</a>
                            </li>
                            @endauth
                           
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                        <!-- // END Main Navigation -->

                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    </div>
                </div>

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content pb-0">


<br>

            @yield('content')












          
          
          
            <div class="js-fix-footer bg-white border-top-2">
                <div class="container page-section py-lg-48pt">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6 col-md-4 mb-24pt mb-md-0">
                                    <h4 class="text-70">Learn</h4>
                                    <nav class="nav nav-links nav--flush flex-column">
                                        <a class="nav-link" href="library.html">Library</a>
                                        
                                    </nav>
                                </div>
                                <div class="col-6 col-md-4 mb-24pt mb-md-0">
                                    <h4 class="text-70">Join us</h4>
                                    <nav class="nav nav-links nav--flush flex-column">
                                       
                                        <a class="nav-link" href="/login">Login</a>
                                        <a class="nav-link" href="/register">Sign Up</a>
                                        
                                    </nav>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-4 text-md-right">
                            <p class="text-70 brand justify-content-md-end">
                                <img class="brand-icon" src="{{URL::asset('assets/images/logo/black-70%402x.png')}}" width="30" alt="Student Learning"> Student Learning
                            </p>
                            <p class="text-muted mb-0 mb-lg-16pt">Student Learning is an online learning platform that helps anyone achieve their personal and professional goals.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-footer page-section py-lg-32pt">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                                <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                                <nav class="nav nav-links nav--flush">
                                    <a href="#" class="nav-link mr-8pt"><img src="{{URL::asset('assets/images/icon/footer/facebook-square%402x.png')}}" width="24" height="24" alt="Facebook"></a>
                                    <a href="#" class="nav-link mr-8pt"><img src="{{URL::asset('assets/images/icon/footer/twitter-square%402x.png')}}" width="24" height="24" alt="Twitter"></a>
                                    <a href="#" class="nav-link mr-8pt"><img src="{{URL::asset('assets/images/icon/footer/vimeo-square%402x.png')}}" width="24" height="24" alt="Vimeo"></a>
                                    <a href="#" class="nav-link"><img src="{{URL::asset('assets/images/icon/footer/youtube-square%402x.png')}}" width="24" height="24" alt="YouTube"></a>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                                <a href="#" class="btn btn-outline-white">English <span class="icon--right material-icons">arrow_drop_down</span></a>
                            </div>
                            <div class="col-md-4 text-md-right">
                                <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                                    <a href="#" class="text-white-70 text-underline mr-16pt">Terms</a>
                                    <a href="#" class="text-white-70 text-underline">Privacy policy</a>
                                </p>
                                <p class="text-white-50 mb-0">Copyright 2019 &copy; All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- // END Header Layout Content -->

    </div>
    <!-- // END Header Layout -->

  
    <!-- drawer -->
    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-dark sidebar-left" data-perfect-scrollbar>
                <div class="sidebar-p-a sidebar-b-b sidebar-m-b pt-0">

                    <!-- Brand -->
                    <a href="index.html" class="sidebar-brand">
                        <img class="sidebar-brand-icon" src="{{URL::asset('assets/images/logo/white-100.svg')}}" width="30" alt="Student Learning">
                        <span>Student Learning</span>
                    </a>
                    <!-- // END Brand -->

                    <!-- Search -->
                  

                </div>

                <ul class="sidebar-menu">
                    @guest
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="sidebar-menu-button" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="sidebar-menu-button" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="sidebar-menu-button" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>

              

            </div>
        </div>
    </div>
    <!-- // END drawer -->
    <!-- App Settings FAB -->
   
  

    <!-- jQuery -->
    <script src="{{URL::asset('assets/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{URL::asset('assets/vendor/popper.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/bootstrap.min.js')}}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{URL::asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

    <!-- DOM Factory -->
    <script src="{{URL::asset('assets/vendor/dom-factory.js')}}"></script>

    <!-- MDK -->
    <script src="{{URL::asset('assets/vendor/material-design-kit.js')}}"></script>

    <!-- Fix Footer -->
    <script src="{{URL::asset('assets/vendor/fix-footer.js')}}"></script>

    <!-- Chart.js -->
    <script src="{{URL::asset('assets/vendor/Chart.min.js')}}"></script>

    <!-- App JS -->
    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    <!-- Highlight.js -->
    <script src="{{URL::asset('assets/js/hljs.js')}}"></script>

    <script src="{{URL::asset('assets/js/plyr.js')}}"></script>


    <!-- App Settings (safe to remove) -->
  




</body>


<!-- Mirrored from Student Learning-bootstrap.frontendmatter.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2019 21:22:02 GMT -->
</html>