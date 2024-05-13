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
                            <form action="" method="post" class="form-valide-with-icon needs-validation" novalidate>
                                <div class="mb-3 d-flex align-items-center justify-content-center" id="imageInput"
                                    style="flex-direction: column;">

                                    <label class="text-label form-label m-0 fw-bold" style="font-size: 15px">Gambar</label>

                                    <img src="" id="preview-image" class="mb-3 mt-1 rounded text-muted bg-white"
                                        style="max-width: 400px; max-height: 400px; border: 2px solid #ccc; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">

                                    <input type="file" class="form-control-file" id="image-upload" accept="image/*"
                                        hidden name="gambar_barang">

                                    <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('image-upload').click();">Ganti Gambar</button>
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
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Nama Barang" name="name">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="text-label form-label ps-2">Jumlah Barang</label>
                                        <input type="number" class="form-control input-default custom-border"
                                            placeholder="Masukkan Jumlah" name="name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="text-label form-label ps-2">Merk</label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Merk" name="name">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="text-label form-label ps-2">Seri</label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Seri" name="name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
