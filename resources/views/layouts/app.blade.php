<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="SuperJob is the most complete and trusted job vacancy site">
    <meta name="keywords" content="Jobs, Website Jobs">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    <!-- font css -->
    <link rel="stylesheet" href="{{asset('fonts/feather.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/material.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" id="main-style-link">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('head')
</head>
<body>
    @if(auth()->check())
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="pc-mob-header pc-header">
        <div class="pcm-logo">
            <img src="{{asset('images/logo.svg')}}" alt="" class="logo logo-lg">
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="pc-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
            <a href="#!" class="pc-head-link" id="headerdrp-collapse">
                <i data-feather="align-right"></i>
            </a>
            <a href="#!" class="pc-head-link" id="header-collapse">
                <i data-feather="more-vertical"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pc-sidebar ">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{asset('images/logo.svg')}}" alt="" class="logo logo-lg">
                    <img src="{{asset('images/logo-sm.svg')}}" alt="" class="logo logo-sm">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{route('dashboard')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">analytics</i></span><span class="pc-mtext">Dashboard</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{route('categories.index')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">layers</i></span><span class="pc-mtext">Category</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{route('books.index')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">book</i></span><span class="pc-mtext">Books</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{route('borrowings.index')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">people</i></span><span class="pc-mtext">Borrowing</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{route('fines.violation')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">report_problem</i></span><span class="pc-mtext">Violation</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{route('fines.index')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">payments</i></span><span class="pc-mtext">Fines Paid</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="pc-header ">
        <div class="header-wrapper">
            <div class="mr-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link active dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            More
                        </a>
                        <div class="dropdown-menu pc-h-dropdown">
                            <a href="/" class="dropdown-item">
                                <i class="material-icons-two-tone">settings</i>
                                <span>Settings</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('images/user/avatar-2.jpg')}}" alt="image" class="user-avtar">
                            <span>
                                <span class="user-name">{{auth()->user()->name}}</span>
                                <span class="user-desc">{{ucwords(auth()->user()->role)}}</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="material-icons-two-tone">chrome_reader_mode</i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->
    @endif
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
    <script src="{{asset('js/vendor-all.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/feather.min.js')}}"></script>
    <script src="{{asset('js/pcoded.min.js')}}"></script>
    @yield('script')
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>