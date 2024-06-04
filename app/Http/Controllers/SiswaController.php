<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;
use App\Models\Peminjaman;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{

    public function show() {
        return view('user.dashboard');
    }

    public function showInventory() {
        $dataBarang = BarangInventaris::all();
    
        foreach ($dataBarang as $barang) {
            $barang->stok = SeriBarangInventaris::where('id_barang', $barang->id)
                                                ->where('status', 'Tersedia')
                                                ->count();
            $barang->seriMerkStatus = SeriBarangInventaris::where('id_barang', $barang->id)
                                                            ->get(['nomor_seri', 'merk', 'status']);
        }
        
        Log::info($dataBarang);
        return view('user.show-inventory.show-data-user', compact('dataBarang'));
    }
    
    
    public function getSeriBarang($id)
        {
            $seriBarang = SeriBarangInventaris::where('id_barang', $id)->get();
            return response()->json(['seriMerkStatus' => $seriBarang]);
    }

    public function showInputDataPinjam() {
        return view('user.borrow.borrow-user');
    }
    public function showHistory()
    {
        $studentId = auth()->user()->id; 

        $pendingPeminjaman = Peminjaman::with('siswa')
                                    ->where('id_user', $studentId)
                                    ->where('status_perizinan', 'Menunggu')
                                    ->get();

        $ongoingPeminjaman = Peminjaman::with('siswa')
                                    ->where('id_user', $studentId)
                                    ->where('status_perizinan', 'Disetujui')
                                    ->where('status_peminjaman', 'Berlangsung')
                                    ->get();

        $completedPeminjaman = Peminjaman::with('siswa')
                                        ->where('id_user', $studentId)
                                        ->where('status_perizinan', 'Disetujui')
                                        ->where('status_peminjaman', 'Selesai')
                                        ->get();

        $allPeminjaman = $this->preparePeminjamanData($pendingPeminjaman);
        $ongoingData = $this->preparePeminjamanData($ongoingPeminjaman);
        $completedData = $this->preparePeminjamanData($completedPeminjaman);

        return view('user.history-borrow.history-user', compact('allPeminjaman', 'ongoingData', 'completedData'));
    }

    private function preparePeminjamanData($peminjamanData)
    {
        $result = [];

        foreach ($peminjamanData as $peminjaman) {
            $siswa = $peminjaman->siswa;
            $detailSiswa = [
                'nisn' => $siswa->nisn,
                'nama' => $siswa->nama,
                'kelas' => $siswa->kelas,
                'no_hp' => $siswa->no_hp,
                'tanggal_pinjam' => $peminjaman->tanggal_pinjam,
                'tanggal_kembali' => $peminjaman->tanggal_kembali,
                'id' => $peminjaman->id,
            ];

            $detailPeminjaman = [];
            foreach ($peminjaman->details as $detail) {
                $barang = BarangInventaris::findOrFail($detail->id_barang);
                $seriBarang = SeriBarangInventaris::findOrFail($detail->id_seribarang);
                $detailPeminjaman[] = [
                    'gambar' => $barang->gambar_barang,
                    'nama_barang' => $barang->nama_barang,
                    'seri' => $seriBarang->nomor_seri,
                    'merk' => $seriBarang->merk,
                ];
            }

            $result[] = [
                'siswa' => $detailSiswa,
                'detail_peminjaman' => $detailPeminjaman,
            ];
        }

        return $result;
    }
}
