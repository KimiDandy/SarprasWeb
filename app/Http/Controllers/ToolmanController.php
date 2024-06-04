<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ToolmanController extends Controller
{
    public function show() {
        return view('tool-man.dashboard');
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
        return view('tool-man.inventory.inventory-data', compact('dataBarang'));
    }
    
    public function getSeriBarang($id)
        {
            $seriBarang = SeriBarangInventaris::where('id_barang', $id)->get();
            return response()->json(['seriMerkStatus' => $seriBarang]);
    }

    public function showInputData() {
        return view('tool-man.tool.input-tool');
    }

    public function inputData(Request $request)
{
    Log::info($request->all());

    if($request->hasFile('gambar_barang')) {
        $gambarPath = $request->file('gambar_barang')->store('gambar_barang', 'public');
        $gambarUrl = 'storage/' . $gambarPath;
    } else {
        $gambarUrl = null;
    }

    $barang = new BarangInventaris();
    $barang->nama_barang = $request->input('nama_barang');
    $barang->gambar_barang = $gambarUrl;
    $barang->save();

    $nomorSeri = $request->input('nomor_seri');
    $merk = $request->input('merk');
    $idBarang = $barang->id;

    foreach($nomorSeri as $key => $nomor) {
        $seriBarang = new SeriBarangInventaris();
        $seriBarang->nomor_seri = $nomor;
        $seriBarang->merk = $merk[$key];
        $seriBarang->status = 'Tersedia';
        $seriBarang->id_barang = $idBarang;
        $seriBarang->save();
    }

    return redirect()->route('inventory-tool-man')->with('success', 'Barang berhasil disimpan.');
}


    public function showHistory()
{
    $pendingPeminjaman = Peminjaman::with('siswa')->where('status_perizinan', 'Menunggu')->get();
    $ongoingPeminjaman = Peminjaman::with('siswa')
                                    ->where('status_perizinan', 'Disetujui')
                                    ->where('status_peminjaman', 'Berlangsung')
                                    ->get();
    $completedPeminjaman = Peminjaman::with('siswa')
                                    ->where('status_perizinan', 'Disetujui')
                                    ->where('status_peminjaman', 'Selesai')
                                    ->get();

    $allPeminjaman = $this->preparePeminjamanData($pendingPeminjaman);
    $ongoingData = $this->preparePeminjamanData($ongoingPeminjaman);
    $completedData = $this->preparePeminjamanData($completedPeminjaman);

    return view('tool-man.history.history-data', compact('allPeminjaman', 'ongoingData', 'completedData'));
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
