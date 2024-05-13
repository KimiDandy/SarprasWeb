<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ToolmanController extends Controller
{
    public function show() {
        return view('tool-man.dashboard');
    }

    public function showInventory() {
        return view('tool-man.inventory.inventory-data');
    }

    public function showInputData() {
        return view('tool-man.tool.input-tool');
    }

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
            $seriBarang->id_barang = $idBarang;
            $seriBarang->save();
        }

        return redirect()->route('inventory-tool-man')->with('success', 'Barang berhasil disimpan.');
    }

    public function showHistory() {
        return view('tool-man.history.history-data');
    }
}
