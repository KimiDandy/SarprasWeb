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
                    <hr class="m-0" style="opacity: 30%; height: 0.7px; ">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('input-data-tool-man') }}" method="post" class="form-valide-with-icon needs-validation"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 15px; font-weight: 500">Nama Barang</label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Nama Barang" name="nama_barang">
                                    </div>
                                    <div class="col-2">
                                        <label class="text-label form-label ps-5"
                                            style="font-size: 15px; font-weight: 500">Jumlah</label>
                                        <div class="input-group">
                                            <button class="btn btn-outline-primary" type="button" id="tambah">+</button>
                                            <input type="text" id="jumlahBarang" name="jumlah_barang" value="0"
                                                min="1" class="form-control p-0 text-center ">
                                            <button class="btn btn-outline-primary" type="button" id="kurang">-</button>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="btn btn-warning" style="margin-top: 30px" id="nextBtn">Next</div>
                                    </div>
                                </div>

                                <div class="row mb-3" id="detailData">

                                </div>
                                <div class="mb-3 d-flex align-items-center justify-content-center" id="imageInput"
                                    style="flex-direction: column;">
                                    <label class="text-label form-label ps-2 m-0"
                                        style="font-size: 15px; font-weight: 500">Gambar</label>
                                    <img src="" id="preview-image" class="mb-3 mt-1 rounded text-muted p-5 bg-white"
                                        style="border-radius:10px; border-image: 10%; max-width: 400px; max-height: 400px; border: 2px solid #ccc; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                                    <input type="file" class="form-control-file" id="image-upload" accept="image/*"
                                        hidden name="gambar_barang">
                                    <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('image-upload').click();">Pilih Gambar</button>
                                </div>


                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
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

                        document.getElementById('nextBtn').addEventListener('click', function() {
                            var jumlahBarang = parseInt(document.getElementById('jumlahBarang').value);
                            var detailDataContainer = document.getElementById('detailData');
                            detailDataContainer.innerHTML = '';
                            for (var i = 0; i < jumlahBarang; i++) {
                                var row = document.createElement('div');
                                row.className = 'row';

                                var col1 = document.createElement('div');
                                col1.className = 'col-6';
                                var label1 = document.createElement('label');
                                label1.className = 'text-label form-label ps-2';
                                label1.style.fontSize = '15px';
                                label1.style.fontWeight = '500';
                                label1.textContent = 'Nomor Seri';
                                var input1 = document.createElement('input');
                                input1.type = 'text';
                                input1.className = 'form-control input-default custom-border';
                                input1.placeholder = 'Masukkan Nomor Seri';
                                input1.name = 'nomor_seri[]';
                                col1.appendChild(label1);
                                col1.appendChild(input1);

                                var col2 = document.createElement('div');
                                col2.className = 'col-6';
                                var label2 = document.createElement('label');
                                label2.className = 'text-label form-label ps-2';
                                label2.style.fontSize = '15px';
                                label2.style.fontWeight = '500';
                                label2.textContent = 'Merk';
                                var input2 = document.createElement('input');
                                input2.type = 'text';
                                input2.className = 'form-control input-default custom-border';
                                input2.placeholder = 'Masukkan Merk';
                                input2.name = 'merk[]';
                                col2.appendChild(label2);
                                col2.appendChild(input2);

                                row.appendChild(col1);
                                row.appendChild(col2);
                                detailDataContainer.appendChild(row);
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
