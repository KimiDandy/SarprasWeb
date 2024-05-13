@extends('layouts.app-user')
<title>Data Barang - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Pinjam Barang</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%; height: 0.7px; ">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="" method="post" class="form-valide-with-icon needs-validation"
                                novalidate="">
                                <div class="row mb-3">
                                    <div class="col-10">
                                        <div class="form-unit form-divided mb-3 " style="border-radius: 1px">
                                            <label for="equip" class="form-label" style="font-size:15px;">Nama
                                                Barang</label>
                                            <select class="js-equip custom-border" name="equip">

                                                <option value="Palu">Palu</option>
                                                <option value="Paku">Paku</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2" style="height: 30px">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 15px; font-weight: 500">Jumlah</label>
                                        <input type="number" class="form-control input-default custom-border"
                                            placeholder="Jumlah" name="name">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col mt-2 mt-sm-0" id="borrowdate" id="borrowdate">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 15px; font-weight: 500">Tanggal Pinjam
                                        </label>
                                        <div class="input-group " data-placement="left" data-align="top"
                                            data-autobtn-close="true">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input type="date" id="borrow"
                                                class="form-control input-default custom-border" name="borrow_date"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col mt-2 mt-sm-0 " id="returndate">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 15px; font-weight: 500">Tanggal Kembali
                                        </label>
                                        <div class="input-group " data-placement="left" data-align="top"
                                            data-autobtn-close="true">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input type="date" class="form-control input-default custom-border"
                                                name="return_date" value="">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var borrowInput = document.getElementById('borrow');
            var returnInput = document.getElementsByName('return_date')[0];

            borrowInput.addEventListener('change', function() {
                var borrowDate = new Date(borrowInput.value);
                var returnDate = new Date(borrowDate);
                returnDate.setDate(borrowDate.getDate() + 1);


                var returnDateString = returnDate.toISOString().slice(0, 10);
                returnInput.value = returnDateString;


                var today = new Date().setHours(0, 0, 0, 0);
                if (returnDate <= today) {

                    alert("Tanggal kembali harus setelah tanggal pinjam!");
                    returnInput.value = "";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-equip").select2({
                placeholder: "Barang"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Barang');
                }
            });
        });
    </script>
@endsection
