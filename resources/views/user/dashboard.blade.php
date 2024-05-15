@extends('layouts.app-user')
<title>Dashboard - Sarpras SMKN 8 Jember</title>
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h1 style="color:white; font-weight: bold">Selamat Datang</h1>
                                            <h3 style="color: primary">SMK Negeri 8 Jember</h3>
                                            <span></span>
                                            <a href="javascript:void(0);" class="btn btn-rounded-3  fs-18 font-w500">Siswa
                                            </a>
                                        </div>

                                        <div class="col-xl-5 col-sm-6">
                                            <img src="{{ asset('') }}images/logo.png" alt="" class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12 ">
                                        <div class="widget-stat card bg-success"
                                            style="background: linear-gradient(45deg, #FF8340, #FFEB36F3);">
                                            <div class="card-body  p-4">
                                                <div class="media">
                                                    <span class="me-3">
                                                        <i class="fas fa-history"></i>
                                                    </span>
                                                    <div class="media-body text-white text-end">
                                                        <p class="mb-1 ">JUMLAH PINJAM</p>
                                                        <h3 class="text-white">30</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
