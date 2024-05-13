<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')



    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="main-wrapper">


        <div class="nav-header">
            <a href="{{ route('dashboard-user') }}" class="brand-logo">

                <img src="{{ asset('/') }}images/logo.png" width="56" alt="">
                <div class="brand-title">
                    <h2 class="" style="color: var(--primary);">User</h2>
                    <span class="brand-sub-title">SMK Negeri 8 Jember</span>
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>
                        <ul class="navbar-nav header-right">


                            <li class="nav-item dropdown  header-profile">

                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('/') }}images/user.jpg" width="56" alt="">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <form action="{{ route('pages.login') }}" method="get">
                                        @csrf
                                        <button type="submit" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                                width="18" height="18" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12">
                                                </line>
                                            </svg>
                                            <span class="ms-2">Keluar </span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="{{ route('dashboard-user') }}" class="" aria-expanded="false">
                            <i class="fas fa-chart-line"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show-user') }}" class="" aria-expanded="false">
                            <i class="fas fa-cube"></i>
                            <span class="nav-text">Barang Tersedia</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('borrow-user') }}" class="" aria-expanded="false">
                            <i class="fas fa-handshake"></i>
                            <span class="nav-text">Peminjaman Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('history-user') }}" class="" aria-expanded="false">
                            <i class="fas fa-history"></i>
                            <span class="nav-text">Riwayat Pinjam</span>
                        </a>
                    </li>
                </ul>




            </div>
        </div>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')

            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                {{-- <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">SleepZZ Software</a> 2021
                </p> --}}
            </div>
        </div>




    </div>
</body>

</html>
