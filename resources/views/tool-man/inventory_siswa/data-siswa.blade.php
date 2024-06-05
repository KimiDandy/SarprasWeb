@extends('layouts.app-toolman')
<title>Data Siswa - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h2 class="card-title" style="font-weight: bold; font-size: 25px">Data Siswa</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Nomor Telepon</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $index => $siswa)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $siswa->nisn }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas }}</td>
                                        <td>{{ $siswa->nomor_hp }}</td>
                                        <td>{{ $siswa->jurusan }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit-siswa', $siswa->id) }}" class="btn btn-primary shadow btn-xs sharp pt-2 ms-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
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
@endsection
