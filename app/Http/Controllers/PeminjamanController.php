<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Baranginventaris;
use App\Models\Seribaranginventaris;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PeminjamanController extends Controller
{
    public function showInputDataPinjam()
{
    $jurusan = session('jurusan');
    $barang = BarangInventaris::where('jurusan', $jurusan)->get();
    
    return view('user.borrow.borrow-user', compact('barang'));
}

    public function inputDataPinjam(Request $request)
    {
        Log::info($request);
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'barang' => 'required|array',
            'barang.*.id_barang' => 'required|exists:baranginventaris,id',
            'barang.*.jumlah' => 'required|integer|min:1',
        ]);

        $barangYangDiminta = $request->barang;
        $stokTersedia = true;

        foreach ($barangYangDiminta as $item) {
            $id_barang = $item['id_barang'];
            $jumlah = $item['jumlah'];

            $seriBarangList = Seribaranginventaris::where('id_barang', $id_barang)
                ->where('status', 'Tersedia')
                ->take($jumlah)
                ->get();

            if ($seriBarangList->count() < $jumlah) {
                $stokTersedia = false;
                break;
            }
        }

        if (!$stokTersedia) {
            return redirect()->back()->with('error', 'Jumlah barang yang tersedia tidak mencukupi.');
        }

        $peminjaman = new Peminjaman;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status_perizinan = 'Menunggu';
        $peminjaman->id_user = Auth::id();
        $peminjaman->save();

        foreach ($barangYangDiminta as $item) {
            $id_barang = $item['id_barang'];
            $jumlah = $item['jumlah'];

            $seriBarangList = Seribaranginventaris::where('id_barang', $id_barang)
                ->where('status', 'Tersedia')
                ->take($jumlah)
                ->get();

            foreach ($seriBarangList as $seriBarang) {
                $detail = new DetailPeminjaman;
                $detail->id_peminjaman = $peminjaman->id;
                $detail->id_barang = $id_barang;
                $detail->id_seribarang = $seriBarang->id;
                $detail->save();

                $seriBarang->status = 'Dipinjam';
                $seriBarang->save();
            }
        }

        return redirect()->route('history-user')->with('success', 'Permohonan peminjaman berhasil diajukan');
    }

    public function setujuPeminjaman(Request $request)
{
    $peminjaman = Peminjaman::findOrFail($request->id);
    $peminjaman->status_perizinan = 'Disetujui';
    $peminjaman->status_peminjaman = 'Berlangsung';
    $peminjaman->save();

    return response()->json(['success' => true]);
}

public function tolakPeminjama(Request $request)
{
    $peminjaman = Peminjaman::findOrFail($request->id);
    $peminjaman->status_perizinan = 'Ditolak';
    $peminjaman->save();

    return response()->json(['success' => true]);
}

public function selesaiPeminjaman(Request $request)
{
    $peminjaman = Peminjaman::findOrFail($request->id);
    $peminjaman->status_peminjaman = 'Selesai';
    $peminjaman->save();

    return response()->json(['success' => true]);
}


}
