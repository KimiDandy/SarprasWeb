@extends('layouts.app-toolman')
<title>Tambah Barang - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Tambah Barang</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%;
        height: 0.7px; ">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="" method="post" class="form-valide-with-icon needs-validation"
                                novalidate="">
                                <div class="row mb-3">
                                    <div class="col-10">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 15px; font-weight: 500">Nama Barang</label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Nama Barang" name="name">
                                    </div>
                                    <div class="col-2">
                                        <label class="text-label form-label ps-5"
                                            style="font-size: 15px; font-weight: 500">Jumlah</label>
                                        <div class="input-group">
                                            <button class="btn btn-outline-primary" type="button" id="tambah">+</button>
                                            <input type="text" id="jumlahBarang" name="jumlahBarang" value="0"
                                                min="1" class="form-control p-0 text-center ">
                                            <button class="btn btn-outline-primary" type="button" id="kurang">-</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex align-items-center justify-content-center" id="imageInput"
                                    style="flex-direction: column;">
                                    <label class="text-label form-label ps-2 m-0"
                                        style="font-size: 15px; font-weight: 500">Gambar</label>
                                    <img src="" id="preview-image" class="mb-3 mt-1 rounded text-muted p-5 bg-white"
                                        style="border-radius:10px; border-image: 10%; max-width: 400px; max-height: 400px; border: 2px solid #ccc; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">

                                    <input type="file" class="form-control-file" id="image-upload" accept="image/*"
                                        hidden>
                                    <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('image-upload').click();">
                                        Pilih Gambar
                                    </button>
                                </div>
                                <script>
                                    document.getElementById('tambah').addEventListener('click', function() {
                                        var jumlahInput = document.getElementById('jumlahBarang');
                                        jumlahInput.value = parseInt(jumlahInput.value) + 1;
                                    });

                                    document.getElementById('kurang').addEventListener('click', function() {
                                        var jumlahInput = document.getElementById('jumlahBarang');
                                        if (parseInt(jumlahInput.value) > 1) {
                                            jumlahInput.value = parseInt(jumlahInput.value) - 1;
                                        }
                                    });

                                    document.getElementById('image-upload').addEventListener('change', function() {
                                        var file = this.files[0];
                                        if (file) {
                                            var reader = new FileReader();
                                            reader.onload = function(event) {
                                                document.getElementById('preview-image').setAttribute('src', event.target.result);
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
