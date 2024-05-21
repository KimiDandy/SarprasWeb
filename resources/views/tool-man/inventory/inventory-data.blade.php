@extends('layouts.app-toolman')
<title>Data Inventaris - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h2 class="card-title" style="font-weight: bold; font-size: 25px">Data Inventaris</h2>
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
                                    @foreach ($dataBarang as $index => $barang)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($barang->gambar_barang) }}" width="56" alt="Gambar Barang">
                                        </td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn-info btn btn-info shadow btn-xs sharp pt-2 info-detail-btn" data-bs-target="#info-detail" data-bs-toggle="modal" data-id="{{ $barang->id }}" data-name="{{ $barang->nama_barang }}">
                                                    <i class="fa fa-info"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari..." aria-describedby="button-addon2" id="searchInput">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
                    </div>
                    <table class="table table-bordered" style="border-color: #ddd;">
                        <thead style="text-align: center;">
                            <tr>
                                <th scope="col" style="font-weight: bold">Seri</th>
                                <th scope="col" style="font-weight: bold">Merk</th>
                                <th scope="col" style="font-weight: bold">Status</th>
                            </tr>
                        </thead>
                        <tbody id="seriBarang">
                            @foreach ($barang->seriMerkStatus as $item)
                                <tr>
                                    <td>{{ $item->nomor_seri }}</td>
                                    <td>{{ $item->merk }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.info-detail-btn').click(function() {
                var idBarang = $(this).data('id');
                $.ajax({
                    url: '/get-seri-barang/' + idBarang,
                    type: 'GET',
                    success: function(response) {
                        var seriBarangHtml = '';
                        response.seriMerkStatus.forEach(function(item) {
                            seriBarangHtml += '<tr><td>' + item.nomor_seri + '</td><td>' + item.merk + '</td><td>' + item.status + '</td></tr>';
                        });
                        $('#seriBarang').html(seriBarangHtml);
                        $('#info-detail').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
