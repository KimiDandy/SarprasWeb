@extends('layouts.app-toolman')
<title>Riwayat Peminjaman - Sarpras SMKN 8 Jember</title>
@section('content')
    <style>
        input:checked+.slider {
            background-color: #8e44ad;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #8e44ad;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .tab {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .tab button {
            background-color: #8e44ad;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            margin-right: 5px;
            border-radius: 5px;
        }

        .tab button:hover {
            background-color: #673ab7;
        }

        .tab button.active {
            background-color: #512da8;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .table-responsive {
            overflow-x: auto;
            max-width: 100%;
            margin-bottom: 1rem;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            margin-top: 1rem;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table-responsive>.table {
            margin-bottom: 0;
        }

        .table-responsive>.table>thead>tr>th,
        .table-responsive>.table>tbody>tr>th,
        .table-responsive>.table>tfoot>tr>th,
        .table-responsive>.table>thead>tr>td,
        .table-responsive>.table>tbody>tr>td,
        .table-responsive>.table>tfoot>tr>td {
            white-space: nowrap;
        }

        @media screen and (max-width: 767px) {
            .table-responsive>.table {
                width: 100%;
            }
        }
    </style>
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title" style="font-weight: bold; font-size: 25px">Riwayat Peminjaman</h2>
                    </div>
                    <div class="card-body">
                        <div class="tab">
                            <button class="tablinks" onclick="openTab(event, 'permission')"
                                id="defaultOpen">Perizinan</button>
                            <button class="tablinks" onclick="openTab(event, 'ongoing')">Sedang Berlangsung</button>
                            <button class="tablinks" onclick="openTab(event, 'done')">Selesai</button>
                        </div>

                        <div id="permission" class="tab-content">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari..."
                                    aria-describedby="button-addon2" id="searchInputPermission">
                                <button class="btn btn-outline-primary" type="button"
                                    id="button-addon2-permission">Cari</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold">No</th>
                                            <th style="font-weight: bold">Nama Peminjam</th>
                                            <th style="font-weight: bold">NISN</th>
                                            <th style="font-weight: bold">Kelas</th>
                                            <th style="font-weight: bold">No Telepon</th>
                                            <th style="font-weight: bold">Tanggal Pinjam</th>
                                            <th style="font-weight: bold">Tanggal Kembali</th>
                                            <th style="font-weight: bold">Barang</th>
                                            <th style="font-weight: bold">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>1234567890</td>
                                            <td>12A</td>
                                            <td>081234567890</td>
                                            <td>2024-05-13</td>
                                            <td>2024-05-20</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#info-detail-equip"
                                                        data-id="" data-name="">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button
                                                        class="btn-success btn btn-success shadow btn-xs sharp pt-2 me-3"
                                                        data-name="" onclick="confirmAction('approve')">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn-danger btn btn-danger shadow btn-xs sharp pt-2"
                                                        data-name="" onclick="confirmAction('reject')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>KarDoe</td>
                                            <td>1234567890</td>
                                            <td>12A</td>
                                            <td>081234567890</td>
                                            <td>2024-05-13</td>
                                            <td>2024-05-20</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#info-detail-equip"
                                                        data-id="" data-name="">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button
                                                        class="btn-success btn btn-success shadow btn-xs sharp pt-2 me-3"
                                                        data-name="" onclick="confirmAction('approve')">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn-danger btn btn-danger shadow btn-xs sharp pt-2"
                                                        data-name="" onclick="confirmAction('reject')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="ongoing" class="tab-content">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari..."
                                    aria-describedby="button-addon2" id="searchInputOngoing">
                                <button class="btn btn-outline-primary" type="button"
                                    id="button-addon2-ongoing">Cari</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold">No</th>
                                            <th style="font-weight: bold">Nama Peminjam</th>
                                            <th style="font-weight: bold">NISN</th>
                                            <th style="font-weight: bold">Kelas</th>
                                            <th style="font-weight: bold">No Telepon</th>
                                            <th style="font-weight: bold">Tanggal Pinjam</th>
                                            <th style="font-weight: bold">Tanggal Kembali</th>
                                            <th style="font-weight: bold">Barang</th>
                                            <th style="font-weight: bold">Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>KarDoe</td>
                                            <td>1234567890</td>
                                            <td>12A</td>
                                            <td>081234567890</td>
                                            <td>2024-05-13</td>
                                            <td>2024-05-20</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#info-detail-user"
                                                        data-id="" data-name="">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check text-center">
                                                    <input class="form-check-input selesai-checkbox" type="checkbox"
                                                        value="" id="checkbox1">
                                                </div>
                                            </td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="done" class="tab-content">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari..."
                                    aria-describedby="button-addon2" id="searchInputDone">
                                <button class="btn btn-outline-primary" type="button"
                                    id="button-addon2-done">Cari</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold">No</th>
                                            <th style="font-weight: bold">Nama Peminjam</th>
                                            <th style="font-weight: bold">NISN</th>
                                            <th style="font-weight: bold">Kelas</th>
                                            <th style="font-weight: bold">No Telepon</th>
                                            <th style="font-weight: bold">Tanggal Pinjam</th>
                                            <th style="font-weight: bold">Tanggal Kembali</th>
                                            <th style="font-weight: bold">Barang</th>
                                            <th style="font-weight: bold">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Jane Smith</td>
                                            <td>0987654321</td>
                                            <td>12B</td>
                                            <td>089876543210</td>
                                            <td>2024-04-20</td>
                                            <td>2024-04-27</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#info-detail-done"
                                                        data-id="" data-name="">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Selesai</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="modal fade" id="info-detail-user">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-weight: bold; font-size: 20px">Detail Peminjam
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">

                                        </div>
                                        <table class="table table-bordered" style="border-color: #ddd;">

                                            <tbody>
                                                <tr>
                                                    <td>Nama:</td>
                                                    <td>KarDoe</td>
                                                </tr>
                                                <tr>
                                                    <td>NISN:</td>
                                                    <td>1234567890</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas:</td>
                                                    <td>12A</td>
                                                </tr>
                                                <tr>
                                                    <td>No Telepon:</td>
                                                    <td>081234567890</td>
                                                </tr>
                                                <tr>
                                                    <td>Pinjam:</td>
                                                    <td>2024-05-13</td>
                                                </tr>
                                                <tr>
                                                    <td>Kembali:</td>
                                                    <td>2024-05-20</td>
                                                </tr>
                                            </tbody>


                                            <script>
                                                $(document).ready(function() {
                                                    $('#button-addon2').click(function() {
                                                        var searchText = $('#searchInput').val().toLowerCase();
                                                        var $tableRows = $('table tbody tr');
                                                        // var $noValueRow = $('#noValue');

                                                        $tableRows.hide();
                                                        $tableRows.filter(function() {
                                                            return $(this).text().toLowerCase().indexOf(searchText) > -1;
                                                        }).show();

                                                        // $noValueRow.toggle($tableRows.filter(':visible').length === 0);
                                                    });
                                                });
                                            </script>
                                        </table>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary light"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="info-detail-equip">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-weight: bold; font-size: 20px">Detail Barang
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari..."
                                                aria-label="Cari..." aria-describedby="button-addon2" id="searchInput1">
                                            <button class="btn btn-outline-primary" type="button"
                                                id="button-addon2-1">Cari</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="border-color: #ddd;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col" style="font-weight: bold">Gambar</th>
                                                        <th scope="col" style="font-weight: bold">Nama</th>
                                                        <th scope="col" style="font-weight: bold">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('/') }}images/logo.png" width="56"
                                                                alt=""></td>
                                                        <td>Obeng</td>
                                                        <td>3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari..."
                                                aria-label="Cari..." aria-describedby="button-addon2" id="searchInput2">
                                            <button class="btn btn-outline-primary" type="button"
                                                id="button-addon2-2">Cari</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="border-color: #ddd;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col" style="font-weight: bold">Seri</th>
                                                        <th scope="col" style="font-weight: bold">Merk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>123</td>
                                                        <td>Merk A</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary light"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="info-detail-done">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-weight: bold; font-size: 20px">Detail Barang
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari..."
                                                aria-label="Cari..." aria-describedby="button-addon2" id="searchInput3">
                                            <button class="btn btn-outline-primary" type="button"
                                                id="button-addon2-3">Cari</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="border-color: #ddd;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col" style="font-weight: bold">Gambar</th>
                                                        <th scope="col" style="font-weight: bold">Nama</th>
                                                        <th scope="col" style="font-weight: bold">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{ asset('/') }}images/logo.png" width="56"
                                                                alt=""></td>
                                                        <td>Obeng</td>
                                                        <td>3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari..."
                                                aria-label="Cari..." aria-describedby="button-addon2" id="searchInput4">
                                            <button class="btn btn-outline-primary" type="button"
                                                id="button-addon2-4">Cari</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="border-color: #ddd;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col" style="font-weight: bold">Seri</th>
                                                        <th scope="col" style="font-weight: bold">Merk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>123</td>
                                                        <td>Merk A</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary light"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#button-addon2-1').click(function() {
                                    var searchText = $('#searchInput1').val().toLowerCase();
                                    var $tableRows = $('#info-detail-equip table tbody tr');
                                    $tableRows.hide();
                                    $tableRows.filter(function() {
                                        return $(this).text().toLowerCase().indexOf(searchText) > -1;
                                    }).show();
                                });

                                $('#button-addon2-2').click(function() {
                                    var searchText = $('#searchInput2').val().toLowerCase();
                                    var $tableRows = $('#info-detail-equip table tbody tr');
                                    $tableRows.hide();
                                    $tableRows.filter(function() {
                                        return $(this).text().toLowerCase().indexOf(searchText) > -1;
                                    }).show();
                                });

                                $('#button-addon2-3').click(function() {
                                    var searchText = $('#searchInput3').val().toLowerCase();
                                    var $tableRows = $('#info-detail-done table tbody tr');
                                    $tableRows.hide();
                                    $tableRows.filter(function() {
                                        return $(this).text().toLowerCase().indexOf(searchText) > -1;
                                    }).show();
                                });

                                $('#button-addon2-4').click(function() {
                                    var searchText = $('#searchInput4').val().toLowerCase();
                                    var $tableRows = $('#info-detail-done table tbody tr');
                                    $tableRows.hide();
                                    $tableRows.filter(function() {
                                        return $(this).text().toLowerCase().indexOf(searchText) > -1;
                                    }).show();
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("defaultOpen").click();
        });

        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('defaultOpen').click();
            setupSelesaiCheckboxes();
        });

        function setupSelesaiCheckboxes() {
            var selesaiCheckboxes = document.querySelectorAll('.selesai-checkbox');
            selesaiCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function(event) {
                    if (event.target.checked) {
                        confirmAction('selesai', event.target);
                    }
                });
            });
        }

        function confirmAction(actionType, checkbox = null) {
            let title, text, icon, confirmButtonText;
            if (actionType === 'approve') {
                title = 'Are you sure?';
                text = 'Do you want to approve this request?';
                icon = 'warning';
                confirmButtonText = 'Yes, approve it!';
            } else if (actionType === 'reject') {
                title = 'Are you sure?';
                text = 'Do you want to reject this request?';
                icon = 'warning';
                confirmButtonText = 'Yes, reject it!';
            } else if (actionType === 'selesai') {
                title = 'Are you sure?';
                text = 'Do you want to mark this as completed?';
                icon = 'warning';
                confirmButtonText = 'Yes, mark as completed!';
            }

            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: confirmButtonText
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Action Confirmed!',
                        'Your action has been performed.',
                        'success'
                    )
                } else {

                    if (checkbox) {
                        checkbox.checked = false;
                    }
                }
            });
        }
    </script>
@endsection
