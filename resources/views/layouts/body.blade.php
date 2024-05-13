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
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <svg class="logo-abbr" width="5143" height="4315" viewBox="0 0 5143 4315" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1305.86 445.064C1103.63 285.428 964.081 225.052 720.86 140.064C477.638 55.0763 167.998 -61.9368 65.8596 39.0635C-36.2782 140.064 10.8609 780.065 10.8595 858.063C10.8581 936.062 -0.0649815 1229.48 10.8595 1467.06C21.6677 1702.11 33.4074 1834.01 65.8595 2067.06C85.9066 2211.03 101.266 2291.16 127.86 2434.06C155.716 2583.75 167.715 2668.66 205.86 2816.06C252.392 2995.88 353.86 3268.06 353.86 3268.06L525.86 3565.06L650.86 3729.06L845.86 3877.06L1118.86 4072.06L1430.86 4212.06L1664.86 4267.06L1882.86 4314.06L2007.86 4267.06L2062.86 4212.06L1960.86 4002.06L1835.86 3729.06L1765.86 3393.06L1640.86 2668.06L1601.86 2145.06L1562.86 1123.06V694.063C1562.86 694.063 1415.55 531.65 1305.86 445.064Z"
                        fill="#886CC0" />
                    <path
                        d="M2257.37 2054.42C2377.95 2136.05 2461.16 2166.92 2606.18 2210.38C2751.2 2253.84 2935.83 2313.67 2996.73 2262.02C3057.63 2210.38 3029.52 1883.11 3029.53 1843.23C3029.53 1803.34 3036.04 1653.3 3029.53 1531.82C3023.08 1411.62 3016.08 1344.17 2996.73 1225.01C2984.78 1151.39 2975.62 1110.41 2959.76 1037.34C2943.15 960.796 2936 917.378 2913.25 842.003C2885.51 750.055 2825.01 610.873 2825.01 610.873L2722.45 459.002L2647.92 375.14L2531.65 299.46L2368.87 199.747L2182.84 128.158L2043.31 100.033L1913.33 76L1838.79 100.033L1806 128.158L1866.82 235.541L1941.35 375.14L1983.09 546.954L2057.62 917.683L2080.88 1185.12L2104.13 1707.72V1927.09C2104.13 1927.09 2191.97 2010.14 2257.37 2054.42Z"
                        fill="#886CC0" />
                    <path
                        d="M2452.95 3489.74C2311.84 3489.74 2218.09 3422.85 2178.54 3333L2320.62 3209.47C2352.36 3263.67 2406.07 3299.31 2464.18 3299.31C2492.5 3299.31 2534.98 3286.62 2542.3 3250.97C2552.07 3203.61 2488.11 3167.48 2427.56 3130.37C2334.3 3073.24 2272.29 2993.65 2295.72 2881.34C2320.14 2763.67 2442.21 2680.17 2579.41 2680.17C2687.32 2680.17 2778.63 2737.79 2810.86 2816.89L2671.7 2936.03C2652.66 2897.46 2610.66 2871.09 2565.74 2871.09C2528.63 2871.09 2503.24 2893.06 2498.85 2917.48C2491.04 2958 2556.95 2986.81 2611.15 3019.04C2711.74 3079.1 2776.19 3156.25 2754.71 3272.46C2730.78 3402.34 2619.45 3489.74 2452.95 3489.74ZM2810.86 3479L2963.69 2691.89H3234.69C3390.45 2691.89 3505.2 2798.34 3479.8 2975.09C3455.88 3141.6 3326 3247.07 3126.78 3247.07H3069.65L3024.24 3479H2810.86ZM3164.38 3054.68C3232.73 3055.17 3272.29 3023.43 3280.59 2973.63C3288.89 2920.41 3254.71 2884.76 3197.09 2884.76H3139.96L3106.76 3054.2L3164.38 3054.68ZM3471.99 3479L3624.82 2691.89H3895.82C4051.58 2691.89 4166.33 2798.34 4140.94 2975.09C4117.01 3141.6 3987.13 3247.07 3787.91 3247.07H3730.78L3685.37 3479H3471.99ZM3825.51 3054.68C3893.87 3055.17 3933.42 3023.43 3941.72 2973.63C3950.02 2920.41 3915.84 2884.76 3858.22 2884.76H3801.09L3767.89 3054.2L3825.51 3054.68ZM4542.79 2691.89C4707.34 2691.4 4916.33 2787.59 4879.71 3086.42C4832.34 3479 4452.95 3479 4389.96 3479H4133.12L4285.96 2692.38L4542.79 2691.89ZM4665.35 3085.45C4683.42 2957.52 4607.73 2887.2 4498.85 2887.2H4460.76L4384.1 3282.22H4423.65C4515.45 3282.22 4644.84 3235.84 4665.35 3085.45Z"
                        fill="#886CC0" />
                    <path
                        d="M2475.32 3770.74C2475.32 3710.48 2449.1 3669.08 2381.02 3669.08C2299.14 3669.08 2251.76 3748.66 2251.76 3836.06C2251.76 3911.04 2292.7 3938.64 2345.6 3938.64C2436.22 3938.64 2475.32 3834.68 2475.32 3770.74ZM2519.48 3765.68C2519.48 3879.3 2451.4 3977.28 2341.92 3977.28C2261.88 3977.28 2207.6 3929.44 2207.6 3834.22C2207.6 3728.42 2272.46 3630.44 2387.92 3630.44C2472.56 3630.44 2519.48 3685.64 2519.48 3765.68ZM2551.83 3969L2624.51 3638.72H2672.35L2756.53 3863.66L2772.17 3908.74L2789.19 3818.12L2826.45 3638.72H2870.15L2799.31 3969H2753.31L2683.85 3789.14L2651.65 3698.98L2643.37 3743.6L2634.17 3789.14L2596.45 3969H2551.83ZM2883.8 3969L2955.1 3638.72H3000.64L2937.16 3929.44H3110.58L3102.3 3969H2883.8ZM3138.49 3969L3208.41 3638.72H3252.57L3182.65 3969H3138.49ZM3267.43 3969L3340.11 3638.72H3387.95L3472.13 3863.66L3487.77 3908.74L3504.79 3818.12L3542.05 3638.72H3585.75L3514.91 3969H3468.91L3399.45 3789.14L3367.25 3698.98L3358.97 3743.6L3349.77 3789.14L3312.05 3969H3267.43ZM3598.49 3969L3668.41 3638.72H3880.01L3871.73 3677.36H3704.29L3682.67 3779.48H3845.05L3836.77 3818.12H3674.39L3650.93 3930.36H3829.87L3821.59 3969H3598.49Z"
                        fill="#886CC0" />
                    <defs>
                    </defs>
                </svg>
                <div class="brand-title">
                    <h2 class="" style="color: var(--primary);">SPPD</h2>
                    <span class="brand-sub-title">Puskesmas Gondosari</span>
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
                            {{-- <div class="dashboard_bar">
                                Dashboard
                            </div> --}}
                        </div>
                        <ul class="navbar-nav header-right">


                            <li class="nav-item dropdown  header-profile">

                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('/') }}images/user.jpg" width="56" alt="">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('forgotpassword') }}" class="dropdown-item ai-icon">
                                        <i class="fas fa-key" style="color: grey"></i>
                                        <span class="ms-2">Ganti Password </span>
                                    </a>
                                    <form action="{{ route('logout') }}" method="post">
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
                    <li><a href="{{ route('dashboard') }}" class="" aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    @if (Auth::guard('users')->user()->role == 'super-admin')
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-database"></i>
                                <span class="nav-text">Master Data</span>
                            </a>
                            <ul aria-expanded="false">

                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Penugasan</a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ route('employee') }}">Pegawai</a></li>
                                        <li><a href="{{ route('cadress') }}">Kader</a></li>
                                        <li><a href="{{ route('head-health') }}">Kepala Puskesmas </a></li>
                                    </ul>
                                </li>
                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Tujuan</a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ route('type-destination') }}">Tipe Tujuan</a></li>
                                        <li><a href="{{ route('place') }}">Tempat</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('bank-account') }}">Rekening</a></li>
                                <li><a href="{{ route('cost') }}">Biaya</a></li>
                                <li><a href="{{ route('transportation') }}">Alat Angkut</a></li>
                                <li><a href="{{ route('categories') }}">Kategori</a></li>
                                <li><a href="{{ route('account') }}">Akun</a></li>
                                <li><a href="{{ route('user') }}">Pengguna</a></li>
                                <li><a href="{{ route('law') }}">Dasar </a></li>

                            </ul>
                        </li>
                    @endif

                    <li><a class=" " href="{{ route('spt') }}" aria-expanded="false">
                            <i class="fas fa-file-alt"></i>
                            <span class="nav-text">SPT</span>
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

    <!-- Required vendors -->
    {{-- <script src="vendor/global/global.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script> --}}
</body>

</html>
