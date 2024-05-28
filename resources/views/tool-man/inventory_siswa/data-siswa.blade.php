@extends('layouts.app-toolman')
<title>Data Siswa - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid p-0">
        <!-- row -->
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
                                        <th>Nomer Telepon</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1111</td>
                                        <td>Kimi Dandy</td>
                                        <td>XII TKJ</td>
                                        <td>08123456789</td>
                                        <td>Teknik Jaringan Komputer dan Telekomunikasi</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit-siswa') }}" class="btn btn-primary shadow btn-xs sharp pt-2 ms-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
