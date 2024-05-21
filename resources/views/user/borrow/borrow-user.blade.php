@extends('layouts.app-user')
<title>Peminjaman Barang - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title" style="font-weight: bold; font-size: 25px">Pinjam Barang</h2>
                        <div class="mb-3 d-flex align-items-center justify-content-center">
                            <button type="button" id="addBarang" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah
                                Barang</button>
                        </div>
                    </div>
                    <hr class="m-0" style="opacity: 30%; height: 0.7px;">
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="pinjamBarangForm" method="post" class="form-valide-with-icon needs-validation"
                                novalidate>
                                @csrf <!-- Add CSRF token for security -->

                                <div id="formContainer">
                                    <div class="row mb-5">
                                        <div class="col mt-2 mt-sm-0" id="borrowdate">
                                            <label class="text-label form-label ps-2"
                                                style="font-size: 15px; font-weight: 500">Tanggal Pinjam</label>
                                            <div class="input-group" data-placement="left" data-align="top"
                                                data-autobtn-close="true">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                <input type="date" id="borrow"
                                                    class="form-control input-default custom-border" name="borrow_date"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col mt-2 mt-sm-0" id="returndate">
                                            <label class="text-label form-label ps-2"
                                                style="font-size: 15px; font-weight: 500">Tanggal Kembali</label>
                                            <div class="input-group" data-placement="left" data-align="top"
                                                data-autobtn-close="true">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                <input type="date" class="form-control input-default custom-border"
                                                    name="return_date" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button"
                                    class="btn btn-success d-flex justify-content-end align-items-end text-end"
                                    id="submitBtn">Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addButton = document.getElementById('addBarang');
            var formContainer = document.getElementById('formContainer');
            var equipCount = 0;

            addButton.addEventListener('click', function() {
                equipCount++;
                var newRow = document.createElement('div');
                newRow.classList.add('row', 'mb-3');
                newRow.setAttribute('id', 'equipRow' + equipCount);

                newRow.innerHTML = `
                <div class="col-10">
                    <div class="form-unit form-divided mb-3" style="border-radius: 1px">
                        <label for="equip${equipCount}" class="form-label" style="font-size:15px;">Nama Barang</label>
                        <select class="js-equip custom-border" name="equip${equipCount}">
                            <option value="Palu">Palu</option>
                            <option value="Paku">Paku</option>
                        </select>
                    </div>
                </div>
                <div class="col-2" style="height: 30px">
                    <label class="text-label form-label ps-2" style="font-size: 15px; font-weight: 500">Jumlah</label>
                    <input type="number" class="form-control input-default custom-border" placeholder="Jumlah" name="name${equipCount}">
                </div>
                <div class="col-12 text-center justify-content-center" style="height: 30px">
                    <button type="button" class="btn btn-danger" onclick="removeEquip(${equipCount})">Hapus</button>
                </div>
            `;

                formContainer.appendChild(newRow);
                $(".js-equip").select2({
                    placeholder: "Barang"
                }).on('change', function(e) {
                    if ($(this).val() && $(this).val().length) {
                        $(this).next('.select2-container')
                            .find('li.select2-search--inline input.select2-search__field').attr(
                                'placeholder', 'Barang');
                    }
                });

                window.removeEquip = function(id) {
                    var rowToRemove = document.getElementById('equipRow' + id);
                    rowToRemove.remove();
                };

                document.getElementById('submitBtn').addEventListener('click', function(event) {
                    event.preventDefault();
                    if (validateForm()) {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda tidak dapat mengembalikan ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, simpan!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('pinjamBarangForm').submit();
                            }
                        });
                    }
                });

                function validateForm() {
                    const borrowDate = document.getElementById('borrow').value.trim();
                    const returnDate = document.getElementsByName('return_date')[0].value.trim();

                    if (!borrowDate) {
                        Swal.fire('Error', 'Tanggal Pinjam harus diisi', 'error');
                        return false;
                    }

                    if (!returnDate) {
                        Swal.fire('Error', 'Tanggal Kembali harus diisi', 'error');
                        return false;
                    }

                    // Additional validation if needed

                    return true;
                }
            });
        });
    </script>

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
                    Swal.fire("Error", "Tanggal kembali harus setelah tanggal pinjam!", "error");
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
