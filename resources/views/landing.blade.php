<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/') }}images/logo.png" type="image/png" style="size: 200%" />
    <title>Sarpras Online - SMKN 8 Jember</title>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/maicons.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/theme.css">

</head>

<body>

    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a href="#" class="navbar-brand">Sarpras<span class="text-primary">Online</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" data-role="smoothscroll" href="{{ route('landing') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-role="smoothscroll" href="#about">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-role="smoothscroll" href="#services">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-2" href="{{ route('register') }}">Daftar</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container">
            <div class="page-banner home-banner">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4 "><b>Sarpras Online</b></h1>
                        <p class="text-lg text-grey mb-5">Penyedia layanan pinjam meminjam sarana prasarana SMK Negeri 8
                            Jember</p>
                        <a href="https://smkn8jember.sch.id/" class="btn btn-primary btn-split">Profile <div
                                class="fab"><span class="mt-0"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-globe"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z" />
                                    </svg></span></div></a>
                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class="img-fluid text-center">
                            <img src="{{ asset('/') }}assets/img/head.png" style="height: 500px" alt="">
                        </div>
                    </div>
                </div>
                <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
            </div>
        </div>
    </header>

    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="../assets/img/services/service-1.svg" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Terpercaya</h5>
                            <p>Layanan yang terpercaya kualitas dan kemudahan akses </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="../assets/img/services/service-2.svg" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Berkualitas</h5>
                            <p>Penawaran barang dengan kualitas yang tidak diragukan</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="../assets/img/services/service-3.svg" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Lengkap</h5>
                            <p>Barang apapun dengan tipe apapun tersedia</p>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <span class="subhead">Tentang</span>
                    <h2 class="title-section">Sarana Prasarana Online</h2>
                    <div class="divider"></div>

                    <p>Platform Sarpras Online hadir sebagai jawaban atas kebutuhan pengelolaan sarana dan prasarana
                        sekolah yang modern dan efisien. </p>
                    <p>Melalui platform ini, monitoring, pengelolaan, dan perawatan
                        fasilitas sekolah dapat dilakukan dengan mudah dan terintegrasi, hanya dengan beberapa klik.</p>
                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid py-3 text-center">
                        <img src="{{ asset('/') }}assets/img/about.png" style="height: 400px" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section bg-light" id="services">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Layanan</div>
                <h2 class="title-section">Bagaimana kami dapat membantu ?</h2>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                    <path
                                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                                    <path
                                        d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                                </svg></span>
                        </div>
                        <h5>Inventarisasi Aset</h5>
                        <p>Melakukan pendataan dan pencatatan seluruh aset sekolah secara detail dan akurat, termasuk
                            informasi jenis aset, kondisi, lokasi, dan masa pakai.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-calendar-event"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg></span>
                        </div>
                        <h5>Perawatan Terjadwal</h5>
                        <p>Menyusun jadwal perawatan rutin untuk setiap aset berdasarkan jenis, kondisi, dan masa
                            pakainya.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-file-earmark-text-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                </svg></span>
                        </div>
                        <h5>Pelaporan Berkala</h5>
                        <p>Secara otomatis menghasilkan laporan berkala tentang kondisi aset, status inventaris, dan
                            riwayat perawatan.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                                </svg></span>
                        </div>
                        <h5>Pengadaan Barang</h5>
                        <p>Membantu dalam proses pengadaan barang untuk kebutuhan sarpras sekolah secara efisien dan
                            transparan.</p>
                    </div>
                </div>


            </div>

        </div> <!-- .container -->
    </div> <!-- .page-section -->
    <!-- Banner info -->
    <div class="page-section banner-info">
        <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
                        <h2 class="title-section">Keunggulan <br> </h2>
                        <div class="divider"></div>
                        <p>Kami mempunyai keunggulan yang dapat menjadi solusi cerdas untuk mengelola fasilitas sekolah
                            secara modern, transparan, dan akuntabel, demi mendukung kemajuan pendidikan di Indonesia
                        </p>

                        <ul class="theme-list theme-list-light text-white">
                            <li>
                                <div class="h5">Akses Mudah</div>
                                <p> Platform ini dapat diakses kapanpun dan dimanapun, sehingga memudahkan monitoring
                                    dan pengelolaan sarpras secara real-time.</p>
                            </li>
                            <li>
                                <div class="h5">Fitur Lengkap</div>
                                <p>Dilengkapi dengan berbagai fitur yang menunjang pengelolaan sarpras secara
                                    komprehensif, mulai dari inventarisasi aset, pemeliharaan terjadwal, hingga
                                    pelaporan berkala.</p>
                            </li>
                            <li>
                                <div class="h5">Efektivitas</div>
                                <p>Mengoptimalkan proses pengelolaan sarpras, menghemat waktu dan biaya, serta
                                    meningkatkan kualitas pendidikan.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <div class="img-fluid text-center">
                            <img src="../assets/img/banner_image_2.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .wrap -->
    </div> <!-- .page-section -->

    <footer class="page-footer bg-image" style="background-image: url(../assets/img/world_pattern.svg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 py-3">
                    <h3>Sarpras Online</h3>
                    <p>Layanan pinjam meminjam Sarana Prasarana SMK Negeri 8 Jember</p>

                    <div class="social-media-button">
                        <a href="https://web.facebook.com/OFFICIALSMKN8JEMBER/?_rdc=1&_rdr"><span
                                class="mai-logo-facebook-f"></span></a>
                        <a href="https://www.instagram.com/smkn8_official/"><span
                                class="mai-logo-instagram"></span></a>
                        <a href="https://www.youtube.com/channel/UCOiaOwoFk5farZPwhgrsr6A"><span
                                class="mai-logo-youtube"></span></a>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Tautan</h5>
                    <ul class="footer-menu">
                        <li><a href="#about" data-role="smoothscroll">Tentang</a></li>
                        <li><a href="#services" data-role="smoothscroll">Layanan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Alamat</h5>
                    <p>Jl. Pelita no 27 Sidomekar - Semboro - Jember, Jawa Timur</p>
                    <a href="tel:0336444112"class="footer-link">(0336)444112</a>
                    <a class="footer-link" href="mailto:smknegeri08jember@gmail.com">smknegeri08jember@gmail.com</a>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>SMK Negeri 8 Jember</h5>
                    <p>Bisa dan Hebat !</p>
                </div>
            </div>

            <p class="text-center" id="copyright">Copyright &copy; 2024 <a href="https://smkn8jember.sch.id/"
                    target="_blank">SMK Negeri 8 Jember</a></p>
        </div>
    </footer>

    <script src="{{ asset('/') }}assets/js/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('/') }}assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/') }}assets/js/google-maps.js"></script>

    <script src="{{ asset('/') }}assets/vendor/wow/wow.min.js"></script>

    <script src="{{ asset('/') }}assets/js/theme.js"></script>

</body>

</html>
