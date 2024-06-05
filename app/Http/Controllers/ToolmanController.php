<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\User;
use App\Models\Siswa;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ToolmanController extends Controller
{
    public function show() {
        return view('tool-man.dashboard');
    }

    public function showInventory() {
        $jurusan = session('jurusan');
    
        $dataBarang = BarangInventaris::where('jurusan', $jurusan)->get();
    
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
    
    
    public function editInventory($id) {
        $barang = BarangInventaris::findOrFail($id);
        $seriBarang = SeriBarangInventaris::where('id_barang', $id)->get();
        return view('tool-man.inventory.edit-inventory', compact('barang', 'seriBarang'));
    }
    
    public function updateInventory(Request $request, $id) {
        DB::transaction(function() use ($request, $id) {
            $barang = BarangInventaris::findOrFail($id);
    
            if ($request->hasFile('gambar_barang')) {
                $gambarPath = $request->file('gambar_barang')->store('public/gambar_barang');
                $gambarUrl = str_replace('public/', 'storage/', $gambarPath);
                $barang->gambar_barang = $gambarUrl;
            }
    
            $barang->nama_barang = $request->input('nama_barang');
            $barang->save();
    
            $nomorSeri = $request->input('nomor_seri');
            $merk = $request->input('merk');
            $existingIds = $request->input('seri_ids', []);
            $idBarang = $barang->id;
    
            $seriBarangToDelete = SeriBarangInventaris::where('id_barang', $idBarang)
                ->whereNotIn('id', $existingIds)
                ->get();
    
            foreach ($seriBarangToDelete as $seri) {
                DetailPeminjaman::where('id_seribarang', $seri->id)->delete();
                $seri->delete();
            }
    
            foreach($nomorSeri as $key => $nomor) {
                $seriBarang = SeriBarangInventaris::firstOrNew(['id' => $existingIds[$key] ?? null]);
                $seriBarang->nomor_seri = $nomor;
                $seriBarang->merk = $merk[$key];
                $seriBarang->id_barang = $idBarang;
                $seriBarang->save();
            }
        });
    
        return redirect()->route('inventory-tool-man')->with('success', 'Barang berhasil diupdate.');
    }
    
    
    public function deleteInventory($id) {
        DB::transaction(function() use ($id) {
            $barang = BarangInventaris::findOrFail($id);
            SeriBarangInventaris::where('id_barang', $id)->delete();
            $barang->delete();
        });
    
        return redirect()->route('inventory-tool-man')->with('success', 'Barang berhasil dihapus.');
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

    $jurusan = session('jurusan');

    if($request->hasFile('gambar_barang')) {
        $gambarPath = $request->file('gambar_barang')->store('gambar_barang', 'public');
        $gambarUrl = 'storage/' . $gambarPath;
    } else {
        $gambarUrl = null;
    }

    $barang = new BarangInventaris();
    $barang->nama_barang = $request->input('nama_barang');
    $barang->gambar_barang = $gambarUrl;
    $barang->jurusan = $jurusan;
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
    $jurusan = session('jurusan');
    Log::info('Jurusan from session: ' . $jurusan);

    $pendingPeminjaman = Peminjaman::whereHas('siswa', function ($query) use ($jurusan) {
        $query->where('jurusan', $jurusan);
    })->where('status_perizinan', 'Menunggu')->with('siswa')->get();

    $ongoingPeminjaman = Peminjaman::whereHas('siswa', function ($query) use ($jurusan) {
        $query->where('jurusan', $jurusan);
    })->where('status_perizinan', 'Disetujui')->where('status_peminjaman', 'Berlangsung')->with('siswa')->get();

    $completedPeminjaman = Peminjaman::whereHas('siswa', function ($query) use ($jurusan) {
        $query->where('jurusan', $jurusan);
    })->where('status_perizinan', 'Disetujui')->where('status_peminjaman', 'Selesai')->with('siswa')->get();

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
            'no_hp' => $siswa->nomor_hp,
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

public function showSiswa() {
    $jurusan = session('jurusan');
    $siswas = Siswa::where('jurusan', $jurusan)->get();
    return view('tool-man.inventory_siswa.data-siswa', compact('siswas'));
}

public function editSiswa($id) {
    $siswa = Siswa::findOrFail($id);
    $user = User::findOrFail($siswa->id_user);
    return view('tool-man.inventory_siswa.edit-siswa', compact('siswa', 'user'));
}

public function updateSiswa(Request $request, $id) {
    DB::transaction(function() use ($request, $id) {
        $siswa = Siswa::findOrFail($id);
        $user = User::findOrFail($siswa->id_user);

        $siswa->nisn = $request->input('nisn');
        $siswa->nama = $request->input('nama');
        $siswa->kelas = $request->input('kelas');
        $siswa->nomor_hp = $request->input('nomor');
        $siswa->jurusan = $request->input('jurusan');
        $siswa->save();

        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->save();
    });

    return redirect()->route('inventory-siswa-tool-man')->with('success', 'Data siswa berhasil diupdate.');
}

public function deleteSiswa($id) {
    DB::transaction(function() use ($id) {
        $siswa = Siswa::findOrFail($id);
        $user = User::findOrFail($siswa->id_user);

        $siswa->delete();
        $user->delete();
    });

    return redirect()->route('inventory-siswa-tool-man')->with('success', 'Data siswa berhasil dihapus.');
}


}
