@extends('layouts.app-toolman')
<title>Tambah Barang - Sarpras SMKN 8 Jember</title>
@section('content')
    <style>
        .img-area {
            position: relative;
            height: 400px;
            max-height: 1000px;
            background: #fff;
            margin-bottom: 30px;
            border-radius: 15px;
            border: 2px solid #8e44ad;
            /* tambahkan properti border di sini */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }


        .img-area-info {
            position: relative;
            width: 100%;
            height: 400px;
            max-height: 1000px;
            background: #fff;
            margin-bottom: 30px;
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .img-area .icon {
            font-size: 100px;
        }

        .img-area-info .icon {
            font-size: 100px;
        }

        .img-area h3 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .img-area-info h3 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .img-area p {
            color: #999;
        }

        .img-area-info p {
            color: #999;
        }

        .img-area p span {
            font-weight: 600;
        }

        .img-area-info p span {
            font-weight: 600;
        }

        .img-area img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 100;
        }

        .img-area-info img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 100;
        }

        .img-area::before {
            content: attr(data-img);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .5);
            color: #fff;
            font-weight: 500;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
            opacity: 0;
            transition: all .3s ease;
            z-index: 200;
        }

        .img-area-info::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
            /* Set initial z-index for pseudo-element */
        }

        .img-area-info::before {
            content: attr(data-img);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .5);
            color: #fff;
            font-weight: 500;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
            opacity: 0;
            transition: all .3s ease;
            z-index: 200;
        }

        .img-area.active:hover::before {
            opacity: 1;
        }

        .img-area-info.active:hover::before {
            opacity: 1;
        }

        .select-image {
            display: block;
            width: 100%;
            padding: 16px 0;
            border-radius: 15px;
            background: #8e44ad;
            color: #fff;
            font-weight: 500;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: all .3s ease;
        }

        .select-image-info {
            display: block;
            width: 100%;
            padding: 16px 0;
            border-radius: 15px;
            background: #8e44ad;
            color: #fff;
            font-weight: 500;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: all .3s ease;
        }

        .select-image:hover {
            background: #8e44ad;
        }

        .select-image-info:hover {
            background: #8e44ad;
        }
    </style>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title" style="font-weight: bold; font-size: 25px">Tambah Barang</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%; height: 0.7px;">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('input-data-tool-man') }}" method="post" class="form-valide-with-icon needs-validation"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-8">
                                        <label class="text-label form-label ps-2">Nama Barang</label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Nama Barang" name="nama_barang">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="text-label form-label ps-2">Jumlah</label>
                                        <div class="input-group">
                                            <button class="btn btn-outline-primary" type="button" id="tambah">+</button>
                                            <input type="text" id="jumlahBarang" name="jumlah_barang" value="0"
                                                min="1" class="form-control p-0 text-center ">
                                            <button class="btn btn-outline-primary" type="button" id="kurang">-</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 d-flex align-items-end justify-content-end">
                                        <div class="btn btn-primary" style="margin-top: 15px" id="nextBtn">Next</div>
                                    </div>
                                </div>

                                <div class="row mb-3" id="detailData"></div>

                                <div class="col-sm-12 p-0 text-center align-item-center justify-content-center">

                                    <div class="card-body">
                                        <div class="container align-item-center justify-content-center">
                                            <input type="file" id="gambarBarang" accept="image/*" name="gambar_barang"
                                                style="display: none">
                                            <div class="img-area" data-img="">
                                                <i class='fas fa-cloud-upload-alt '
                                                    style="font-size:50px; color:#8e44ad"></i>
                                                <h3>Unggah Gambar</h3>
                                                <p>Pastikan file kurang dari <span>2MB</span></p>
                                            </div>
                                            <div style="display: flex; justify-content: center;">
                                                <button type="button" style="padding: 6px; width: 200px;"
                                                    class="select-image btn btn-primary"> Pilih Gambar</button>
                                            </div>
                                        </div>
                                    </div>
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
                                col1.className = 'col-lg-6';
                                var label1 = document.createElement('label');
                                label1.className = 'text-label form-label ps-2';
                                label1.textContent = 'Nomor Seri';
                                var input1 = document.createElement('input');
                                input1.type = 'text';
                                input1.className = 'form-control input-default custom-border';
                                input1.placeholder = 'Masukkan Nomor Seri';
                                input1.name = 'nomor_seri[]';
                                col1.appendChild(label1);
                                col1.appendChild(input1);

                                var col2 = document.createElement('div');
                                col2.className = 'col-lg-6';
                                var label2 = document.createElement('label');
                                label2.className = 'text-label form-label ps-2';
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
    <script>
        const selectImage = document.querySelector('.select-image');
        const inputGambarBarang = document.querySelector('#gambarBarang');
        const imgArea = document.querySelector('.img-area');

        selectImage.addEventListener('click', function() {
            inputGambarBarang.click();
        });

        inputGambarBarang.addEventListener('change', function() {
            handleImageChange(inputGambarBarang, imgArea);
        });

        function handleImageChange(inputFile, imgArea) {
            const image = inputFile.files[0];
            if (image.size < 2000000) {
                const reader = new FileReader();
                reader.onload = () => {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item => item.remove());
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;

                    // Set z-index dynamically
                    const zIndexValue = allImg.length + 1;
                    img.style.zIndex = zIndexValue;
                    imgArea.style.zIndex = zIndexValue;
                };
                reader.readAsDataURL(image);
            } else {
                alert('Image size more than 2MB');
            }
        }

        function validateImage() {
            const inputFile = document.querySelector('#file');
            const imgArea = document.querySelector('.img-area');
            if (inputFile.files.length <= 0) {
                alert('Harap Pilih Gambar Terlebih dahulu');
                return false;
            }
            return true;
        }
    </script>
@endsection
