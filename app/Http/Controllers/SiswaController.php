<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;

use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{

    public function show() {
        return view('user.dashboard');
    }

    public function showInventory() {
        $dataBarang = BarangInventaris::all();
    
        foreach ($dataBarang as $barang) {
            $barang->stok = SeriBarangInventaris::where('id_barang', $barang->id)->count();
            $barang->seriMerkStatus = SeriBarangInventaris::where('id_barang', $barang->id)->get(['nomor_seri', 'merk', 'status']);
        }
        
        Log::info($dataBarang);
        return view('user.show-inventory.show-data-user', compact('dataBarang'));
    }

    public function showInputDataPinjam() {
        return view('user.borrow.borrow-user');
    }

    public function showHistory() {
        return view('user.history-borrow.history-user');
    }

}
