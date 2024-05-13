@extends('layouts.app-user')
<title>Data Inventaris - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 pt-3 pb-3 pe-3">
                        <div class="row">
                            <div class="col-sm-6">
                            </div>

                            <div class="col-sm-6 text-md-end">
                                <div class="buttton" role="" aria-label="Basic mixed styles example"
                                    style="padding: 1%">
                                    <a href=""> <button type="btn" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg> Tambah
                                        </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Data Inventaris</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach ($data as $item) --}}
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>1</td>
                                        <td><img src="{{ asset('/') }}images/logo.png" width="56" alt="">
                                        </td>
                                        <td>Logo</td>
                                        <td>2</td>
                                        <td>
                                            <div class="d-flex ">
                                                <button class="btn-info btn btn-info shadow btn-xs sharp pt-2"
                                                    data-bs-toggle="modal" data-bs-target="#info-detail" data-id=""
                                                    data-name="">
                                                    <i class="fa fa-info"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="info-detail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 20px">Detail Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari..."
                            aria-describedby="button-addon2"id="searchInput">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
                    </div>
                    <table class="table table-bordered" style="border-color: #ddd;"">
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
                            <tr>
                                <td>456</td>
                                <td>Merk B</td>
                            </tr>
                            {{-- <tr id="noValue" style="display: none;">
                                <td colspan="2" style="text-align: center;">Tidak Ada Data</td>
                            </tr> --}}
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
                    <button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>



    {{-- <script>
        $('.btn-info').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');


            $('').val(id);
        });
    </script> --}}
@endsection
