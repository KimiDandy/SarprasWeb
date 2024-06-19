<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class InputInventoryController extends Controller
{
    public function inputData(Request $request)
    {
        Log::info($request);

        if($request->hasFile('gambar_barang')) {
            $gambarPath = $request->file('gambar_barang')->store('public/gambar_barang');
            $gambarPath = asset(str_replace('public/', 'storage/', $gambarPath));
        } else {
            $gambarPath = null;
        }

        $barang = new BarangInventaris();
        $barang->nama_barang = $request->input('nama_barang');
        $barang->gambar_barang = $gambarPath;
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
}
