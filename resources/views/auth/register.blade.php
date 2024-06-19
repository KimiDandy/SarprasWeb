<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Daftar - Sarpras SMKN 8 Jember</title>
    <link rel="icon" href="{{ asset('/') }}images/logo.png" type="image/png" style="size: 200%" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/zh-TW.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <script src="{{ asset('/') }}vendor/toastr/js/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}vendor/toastr/css/toastr.min.css">
</head>

<body class="vh-200">
    <div class="authincation h-200 p-0">
        <div class="container h-200 p-0">
            <div class="row justify-content-center h-200 p-0 align-items-center m-5">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form pb-2 m-1">
                                    <div class="text-center mb-3">
                                        <img src="images/logo.png" alt="" style="width: 100px; height: 100px">
                                    </div>
                                    <div class="text-center mb-3">
                                        <h4 style="font-weight: bold ">SMKN 8 Jember</h4>
                                    </div>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                            <label for="role" class="form-label">Daftar Sebagai</label>
                                            <select class="js-regist-as custom-border" name="role">
                                                <option value="Pilih">Pilih Role</option>
                                                <option value="Toolman">ToolMan</option>
                                                <option value="Siswa">Siswa</option>
                                            </select>
                                        </div>

                                        <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                            <label for="jurusan" class="form-label">Jurusan</label>
                                            <select class="js-major custom-border" name="jurusan">
                                                <option value="Teknik dan Bisnis Sepeda Motor">Teknik dan Bisnis Sepeda Motor</option>
                                                <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Multimedia">Multimedia</option>
                                                <option value="Agribisnis Tanaman Pangan Holtikultura">Agribisnis Tanaman Pangan Holtikultura</option>
                                                <option value="Pemuliaan dan Pembenihan Tanaman">Pemuliaan dan Pembenihan Tanaman</option>                                                
                                            </select>
                                        </div>

                                        <div id="siswaFields" style="display: none;">
                                            <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                                <label for="nisn" class="form-label">NISN</label>
                                                <input type="text" class="form-control" id="nisn" name="nisn"
                                                    placeholder="Masukkan NISN">
                                            </div>
                                            <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                                <label for="nama_lengkap_siswa" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap_siswa"
                                                    name="nama_lengkap_siswa" placeholder="Masukkan Nama Lengkap">
                                            </div>

                                            <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <select class="js-classUser custom-border" name="kelas">
                                                    <option value="XI">X</option>
                                                    <option value="XI">XI</option>
                                                    <option value="XII">XII</option>
                                                </select>
                                            </div>
                                            <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                                <label for="nomor_handphone_siswa" class="form-label">Nomor Handphone</label>
                                                <input type="text" class="form-control" id="nomor_handphone_siswa"
                                                    name="nomor_handphone_siswa" placeholder="Masukkan Nomor Handphone">
                                            </div>
                                        </div>

                                        <div id="toolmanFields" style="display: none;">
                                            <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                                <label for="nama_lengkap_toolman" class="form-label">Nama
                                                    Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap_toolman"
                                                    name="nama_lengkap_toolman" placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                                <label for="nomor_handphone_toolman" class="form-label">Nomor
                                                    Handphone</label>
                                                <input type="text" class="form-control" id="nomor_handphone_toolman"
                                                    name="nomor_handphone_toolman"
                                                    placeholder="Masukkan Nomor Handphone">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <div class="input-group" id="">
                                                <input type="username" class="form-control border-end-0"
                                                    name="username" id="inputUsername" placeholder="Username Anda">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="">
                                                <input type="password" class="form-control border-end-0"
                                                    name="password" id="inputChoosePassword"
                                                    placeholder="Password Anda">
                                                <a href="javascript:;" class="input-group-text bg-primary"
                                                    id="show-hide-password">
                                                    <i class="fa fa-eye" style="color: white"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="text-center mt-5 mb-2">Sudah punya Akun ? <a
                                            href="{{ '/login' }}" style="font-weight: bold">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('inputChoosePassword');
        const showHidePasswordButton = document.getElementById('show-hide-password');
        let isPasswordVisible = false;

        showHidePasswordButton.addEventListener('click', () => {
            if (isPasswordVisible) {
                passwordInput.type = 'password';
                showHidePasswordButton.innerHTML = '<i class="fa fa-eye" style="color: white"></i>';
            } else {
                passwordInput.type = 'text';
                showHidePasswordButton.innerHTML = '<i class="fa fa-eye-slash" style="color: white"></i>';
            }
            isPasswordVisible = !isPasswordVisible;
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script>
        $(document).ready(function() {

            $(".js-regist-as").select2({
                placeholder: "Daftar Sebagai"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Daftar Sebagai');
                }

                var selectedValue = $(this).val();
                if (selectedValue === 'Siswa') {
                    $('#siswaFields').show();
                    $('#toolmanFields').hide();
                } else if (selectedValue === 'Toolman') {
                    $('#siswaFields').hide();
                    $('#toolmanFields').show();
                } else {
                    $('#siswaFields').hide();
                    $('#toolmanFields').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-classUser").select2({
                placeholder: "Kelas"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Kelas');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-major").select2({
                placeholder: "Jurusan"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Jurusan');
                }
            });
        });
    </script>
    @if ($errors->any())
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            (function($) {
                "use strict";
                $(document).ready(function() {
                    toastr.error("{{ $errors->first() }}", "Error", {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: true,
                        debug: false,
                        newestOnTop: true,
                        progressBar: true,
                        preventDuplicates: true,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: false
                    });
                });
            })(jQuery);
        </script>
    @endif
</body>

</html>
