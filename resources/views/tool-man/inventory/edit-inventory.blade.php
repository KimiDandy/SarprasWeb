@extends('layouts.app-toolman')
<title>Edit Barang - Sarpras SMKN 8 Jember</title>
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header">
                    <h2 class="card-title" style="font-weight: bold; font-size: 25px">Edit Barang</h2>
                </div>
                <hr class="m-0" style="opacity: 30%; height: 0.7px;">
                <div class="card-body">
                    <div class="basic-form">
                        <form id="editBarangForm" action="{{ route('update.inventory', $barang->id) }}" method="post" enctype="multipart/form-data" class="form-valide-with-icon needs-validation" novalidate>
                            @csrf

                            <div class="mb-3 d-flex align-items-center justify-content-center" id="imageInput" style="flex-direction: column;">
                                <label class="text-label form-label m-0 fw-bold" style="font-size: 15px">Gambar</label>
                                <img src="{{ asset($barang->gambar_barang) }}" id="preview-image" class="mb-3 mt-1 rounded text-muted bg-white" style="max-width: 400px; max-height: 400px; border: 2px solid #ccc; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                                <input type="file" class="form-control-file" id="image-upload" accept="image/*" hidden name="gambar_barang">
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('image-upload').click();">Ganti Gambar</button>
                            </div>

                            <script>
                                document.getElementById('image-upload').addEventListener('change', function(event) {
                                    const previewImage = document.getElementById('preview-image');
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            previewImage.src = e.target.result;
                                        }
                                        reader.readAsDataURL(file);
                                    }
                                });
                            </script>

                            <div class="row mb-3">
                                <div class="col-lg-8">
                                    <label class="text-label form-label ps-2">Nama Barang</label>
                                    <input type="text" class="form-control input-default custom-border" placeholder="Edit Nama Barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label class="text-label form-label ps-2">Daftar Seri dan Merk</label>
                                    <div id="seri-container">
                                        @foreach ($seriBarang as $seri)
                                            <div class="row seri-item mb-2 align-items-center" data-id="{{ $seri->id }}">
                                                <input type="hidden" name="seri_ids[]" value="{{ $seri->id }}">
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control input-default custom-border" placeholder="Edit Seri" name="nomor_seri[]" value="{{ $seri->nomor_seri }}" required>
                                                </div>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control input-default custom-border" placeholder="Edit Merk" name="merk[]" value="{{ $seri->merk }}" required>
                                                </div>
                                                <div class="col-lg-2 d-flex justify-content-around">
                                                    <button type="button" class="btn btn-danger delete-seri-btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" id="add-seri-btn">Tambah Item</button>
                            </div>
                            <button type="button" class="btn btn-success" id="submitBtn">Simpan</button>
                            <button type="button" class="btn btn-danger" id="deleteBtn">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        if (document.getElementById('editBarangForm').checkValidity()) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan disimpan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editBarangForm').submit();
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap isi semua kolom yang diperlukan!'
            });
        }
    });

    document.getElementById('deleteBtn').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('delete.inventory', $barang->id) }}';
            }
        });
    });

    document.getElementById('add-seri-btn').addEventListener('click', function() {
        const container = document.getElementById('seri-container');
        const div = document.createElement('div');
        div.className = 'row seri-item mb-2 align-items-center';
        div.innerHTML = `
            <input type="hidden" name="seri_ids[]" value="">
            <div class="col-lg-5">
                <input type="text" class="form-control input-default custom-border" placeholder="Seri" name="nomor_seri[]" required>
            </div>
            <div class="col-lg-5">
                <input type="text" class="form-control input-default custom-border" placeholder="Merk" name="merk[]" required>
            </div>
            <div class="col-lg-2 d-flex justify-content-around">
                <button type="button" class="btn btn-danger delete-seri-btn">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(div);
    });

    document.addEventListener('click', function(event) {
        if (event.target.closest('.delete-seri-btn')) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Item akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const seriItem = event.target.closest('.seri-item');
                    seriItem.remove();
                    Swal.fire(
                        'Dihapus!',
                        'Item telah dihapus.',
                        'success'
                    );
                }
            });
        }
    });
</script>
@endsection
