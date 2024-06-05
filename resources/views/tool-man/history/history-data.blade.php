@extends('layouts.app-toolman')
<title>Riwayat Peminjaman - Sarpras SMKN 8 Jember</title>
@section('content')
    <style>
        .custom-btn {
            padding: 5px 10px; /* Adjust padding as needed */
            font-size: 14px; /* Adjust font size as needed */
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peminjam</th>
                                                <th>NISN</th>
                                                <th>Kelas</th>
                                                <th>No Telepon</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allPeminjaman as $peminjaman)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $peminjaman['siswa']['nama'] }}</td>
                                                <td>{{ $peminjaman['siswa']['nisn'] }}</td>
                                                <td>{{ $peminjaman['siswa']['kelas'] }}</td>
                                                <td>{{ $peminjaman['siswa']['no_hp'] }}</td>
                                                <td>{{ $peminjaman['siswa']['tanggal_pinjam'] }}</td>
                                                <td>{{ $peminjaman['siswa']['tanggal_kembali'] }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                            data-bs-toggle="modal" data-bs-target="#info-detail-equip"
                                                            data-id="{{ $peminjaman['siswa']['id'] }}">
                                                            <i class="fa fa-info"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button class="btn-success btn btn-success shadow btn-xs sharp pt-2 me-3"
                                                            data-name="{{ $peminjaman['siswa']['nama'] }}" onclick="confirmAction('approve', {{ $peminjaman['siswa']['id'] }})">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <button class="btn-danger btn btn-danger shadow btn-xs sharp pt-2"
                                                            data-name="{{ $peminjaman['siswa']['nama'] }}" onclick="confirmAction('reject', {{ $peminjaman['siswa']['id'] }})">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>NISN</th>
                                            <th>Kelas</th>
                                            <th>No Telepon</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Barang</th>
                                            <th>Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ongoingData as $peminjaman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $peminjaman['siswa']['nama'] }}</td>
                                            <td>{{ $peminjaman['siswa']['nisn'] }}</td>
                                            <td>{{ $peminjaman['siswa']['kelas'] }}</td>
                                            <td>{{ $peminjaman['siswa']['no_hp'] }}</td>
                                            <td>{{ $peminjaman['siswa']['tanggal_pinjam'] }}</td>
                                            <td>{{ $peminjaman['siswa']['tanggal_kembali'] }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#info-detail-equip"
                                                        data-id="{{ $peminjaman['siswa']['id'] }}">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-success btn btn-success shadow btn-xs sharp pt-2 me-3"
                                                        data-name="{{ $peminjaman['siswa']['nama'] }}" onclick="confirmAction('complete', {{ $peminjaman['siswa']['id'] }})">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>NISN</th>
                                            <th>Kelas</th>
                                            <th>No Telepon</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Barang</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($completedData as $peminjaman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $peminjaman['siswa']['nama'] }}</td>
                                            <td>{{ $peminjaman['siswa']['nisn'] }}</td>
                                            <td>{{ $peminjaman['siswa']['kelas'] }}</td>
                                            <td>{{ $peminjaman['siswa']['no_hp'] }}</td>
                                            <td>{{ $peminjaman['siswa']['tanggal_pinjam'] }}</td>
                                            <td>{{ $peminjaman['siswa']['tanggal_kembali'] }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#info-detail-equip"
                                                        data-id="{{ $peminjaman['siswa']['id'] }}">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>Selesai</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal fade" id="info-detail-equip">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-weight: bold; font-size: 20px">Detail Barang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="border-color: #ddd;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col" style="font-weight: bold">Gambar</th>
                                                        <th scope="col" style="font-weight: bold">Nama</th>
                                                        <th scope="col" style="font-weight: bold">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detail-items-table"></tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered" style="border-color: #ddd;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th scope="col" style="font-weight: bold">Jenis</th>
                                                        <th scope="col" style="font-weight: bold">Seri</th>
                                                        <th scope="col" style="font-weight: bold">Merk</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detail-seri-table"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            $(document).ready(function() {
                                console.log('Document is ready.');
                        
                                var allPeminjamanData = @json(array_merge($allPeminjaman, $ongoingData, $completedData));
                                console.log('All Peminjaman Data:', allPeminjamanData);
                        
                                $('#info-detail-equip').on('show.bs.modal', function(event) {
                                    console.log('Modal is being shown.');
                                    var button = $(event.relatedTarget);
                                    var loanId = button.data('id');
                                    console.log('Loan ID:', loanId);
                        
                                    var selectedDetailPeminjaman = allPeminjamanData.find(detail => detail.siswa.id === loanId);
                                    console.log('Selected Detail Peminjaman:', selectedDetailPeminjaman);
                        
                                    if (!selectedDetailPeminjaman) {
                                        console.error('Detail Peminjaman tidak ditemukan!');
                                        return;
                                    }
                        
                                    var itemsTable = $('#detail-items-table');
                                    var detailsTable = $('#detail-seri-table');
                                    itemsTable.empty();
                                    detailsTable.empty();
                        
                                    var groupedItems = groupItems(selectedDetailPeminjaman.detail_peminjaman);
                                    console.log('Grouped Items:', groupedItems);
                        
                                    for (const [key, value] of Object.entries(groupedItems)) {
                                        itemsTable.append('<tr><td><img src="{{ asset('') }}' + value.gambar + '" width="56" alt=""></td><td>' + value.nama_barang + '</td><td>' + value.count + '</td></tr>');
                                    }
                        
                                    detailsTable.append('<tr><th>Jenis</th><th>Seri</th><th>Merk</th></tr>');
                                    selectedDetailPeminjaman.detail_peminjaman.forEach(function(detail) {
                                        detailsTable.append('<tr><td>' + detail.nama_barang + '</td><td>' + detail.seri + '</td><td>' + detail.merk + '</td></tr>');
                                    });
                        
                                    console.log('Items Table HTML:', itemsTable.html());
                                    console.log('Details Table HTML:', detailsTable.html());
                                });
                        
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
                            });
                        
                            function groupItems(details) {
                                let groupedItems = {};
                        
                                details.forEach(detail => {
                                    if (groupedItems[detail.nama_barang]) {
                                        groupedItems[detail.nama_barang].count += 1;
                                    } else {
                                        groupedItems[detail.nama_barang] = {
                                            count: 1,
                                            gambar: detail.gambar,
                                            nama_barang: detail.nama_barang
                                        };
                                    }
                                });
                        
                                return groupedItems;
                            }
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
    
        function confirmAction(actionType, itemId) {
            let title, text, icon, confirmButtonText, route;
    
            if (actionType === 'approve') {
                title = 'Apakah anda yakin?';
                text = 'Apakah anda ingin menyetujui perizinan ini?';
                icon = 'warning';
                confirmButtonText = 'Ya, setuju!';
                route = '{{ route("peminjaman.approve") }}';
            } else if (actionType === 'reject') {
                title = 'Apakah anda yakin?';
                text = 'Apakah anda ingin menolak perizinan ini?';
                icon = 'warning';
                confirmButtonText = 'Ya, tolak!';
                route = '{{ route("peminjaman.reject") }}';
            } else if (actionType === 'complete') {
                title = 'Apakah anda yakin?';
                text = 'Apakah anda ingin menandai bahwa peminjaman sudah selesai?';
                icon = 'warning';
                confirmButtonText = 'Ya, sudah selesai!';
                route = '{{ route("peminjaman.complete") }}';
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
                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: {
                            id: itemId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                'Proses telah berhasil.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Ada kesalahan dalam proses.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
