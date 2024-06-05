@extends('layouts.app-toolman')
<title>Edit Siswa - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title" style="font-weight: bold; font-size: 25px">Edit Data Siswa</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%; height: 0.7px;">
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="editSiswaForm" action="{{ route('update-siswa', $siswa->id) }}" method="post" enctype="multipart/form-data" class="form-valide-with-icon needs-validation">
                                @csrf

                                <div class="row mb-3">
                                    <label class="text-label form-label ps-2">Data Siswa</label>
                                    <div class="col-lg-4">
                                        <label class="text-label form-label ps-2">NISN</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="nisn" value="{{ $siswa->nisn }}" required>
                                    </div>                                    
                                    <div class="col-lg-4">
                                        <label class="text-label form-label ps-2">Nama Siswa</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="nama" value="{{ $siswa->nama }}" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="text-label form-label ps-2">Kelas</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="kelas" value="{{ $siswa->kelas }}" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label class="text-label form-label ps-2">Nomor Telepon</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="nomor" value="{{ $siswa->nomor_hp }}" required>
                                    </div>                                    
                                    <div class="col-lg-8">
                                        <label class="text-label form-label ps-2">Jurusan</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="jurusan" value="{{ $siswa->jurusan }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3 mt-4">
                                    <label class="text-label form-label ps-2">Data Akun Siswa</label>
                                    <div class="col-lg-6">
                                        <label class="text-label form-label ps-2">Username</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="username" value="{{ $user->username }}" required>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <label class="text-label form-label ps-2">Password</label>
                                        <input type="text" class="form-control input-default custom-border" placeholder="Edit" name="password" value="{{ $user->password }}" required>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-success" id="submitBtn">Simpan</button>
                                    <button type="button" class="btn btn-danger" id="deleteBtn">Hapus</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            if (document.getElementById('editSiswaForm').checkValidity()) {
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
                        document.getElementById('editSiswaForm').submit();
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
                    window.location.href = '{{ route('delete-siswa', $siswa->id) }}';
                }
            });
        });
    </script>
@endsection
