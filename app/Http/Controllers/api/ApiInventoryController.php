<?php

namespace App\Http\Controllers\api;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;
use App\Models\DetailPeminjaman;
use App\Models\Siswa;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class ApiInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function index()
// {
//     // Mendapatkan semua data peminjaman
//     $peminjaman = Peminjaman::get();

//     // Inisialisasi array untuk menyimpan data barang dan detail barang sesuai dengan id peminjaman
//     $dataPeminjaman = [];

//     // Loop melalui setiap peminjaman
//     foreach ($peminjaman as $pinjam) {
//         // Mendapatkan barang berdasarkan ID peminjaman
//         $barang = BarangInventaris::where('id', $pinjam->id)->get();

//         // Mendapatkan detail barang berdasarkan ID peminjaman
//         $detail_barang = SeriBarangInventaris::where('id', $pinjam->id)->get();

//         // Menyimpan data barang dan detail barang sesuai dengan ID peminjaman
//         $dataPeminjaman[] = [
//             'peminjaman' => $pinjam,
//             'barang' => $barang,
//             'detail_barang' => $detail_barang
//         ];
//     }

//     // Mengembalikan respons JSON dengan data barang dan detail barang sesuai dengan ID peminjaman
//     return response()->json(['data_peminjaman' => $dataPeminjaman], 200);
// }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function showvalue()
    {
        // Ambil semua detail peminjaman
        $detail_peminjaman = DetailPeminjaman::get();       
    
        // Inisialisasi array untuk menampung data peminjaman beserta detail barang
        $peminjaman_dan_barang = [];
    
        // Loop melalui setiap detail peminjaman
        foreach ($detail_peminjaman as $detail) {
            // Ambil data peminjaman
            $peminjaman = Peminjaman::find($detail->id_peminjaman);
    
            // Jika peminjaman tidak ditemukan, lanjutkan ke detail peminjaman berikutnya
            if (!$peminjaman) {
                continue;
            }
    
            // Ambil data barang berdasarkan ID barang pada detail peminjaman
            $barang = SeriBarangInventaris::find($detail->id_seribarang);
    
            // Jika barang tidak ditemukan, lanjutkan ke detail peminjaman berikutnya
            if (!$barang) {
                continue;
            }
    
            // Ambil data siswa berdasarkan ID user pada peminjaman
            $idsiswa = Peminjaman::pluck('id_user')->toArray(); // Mengambil array ID user dari Peminjaman
       
        $detail=DetailPeminjaman::pluck('id_barang')->toArray();
        $siswa = Siswa::select('nama', 'kelas')->whereIn('id_user', $idsiswa)->get();
        $babi=BarangInventaris::select('nama_barang','gambar_barang')->whereIn('id',$detail)->get();
    
            // Buat array yang berisi informasi peminjaman beserta detail barang dan informasi siswa
            $peminjaman_dan_barang[] = [
                'barang' => $barang->merk, // Menampilkan merk barang dari SeriBarangInventaris
              // Masukkan informasi peminjaman lainnya di sini sesuai kebutuhan
            ];
            
        }
        
      
    
        // Return response JSON yang berisi data peminjaman beserta detail barang
        return response()->json($siswa, 200);


    }
      // 'data_peminjaman' => $peminjaman_dan_barang
    
        public function soya($id)
    {
        // Mengambil detail peminjaman berdasarkan ID
        $detail_peminjaman = DetailPeminjaman::where('id', $id)->first();

        // Memeriksa apakah detail peminjaman ditemukan
        if (!$detail_peminjaman) {
            return response()->json(['message' => 'Detail peminjaman tidak ditemukan'], 404);
        }

        $lmao = DetailPeminjaman::pluck('id_barang')->toArray();
        // Mengambil barang berdasarkan ID detail peminjaman
        $barang = BarangInventaris::select('nama_barang', 'gambar_barang')->whereIn('id', $lmao)->get();

        // Mengambil semua detail barang terkait dengan ID barang dari detail peminjaman
        $detail_barang = SeriBarangInventaris::where('id_barang', $detail_peminjaman->id_barang)->get();
        $idsiswa = Peminjaman::pluck('id_user')->toArray(); // Mengambil array ID user dari Peminjaman
        $siswa = Siswa::select('nisn', 'nama', 'nomor_hp', 'kelas')->whereIn('id_user', $idsiswa)->get();

        

        // Menyusun data peminjaman, barang, dan semua detail barang dalam respons JSON
        $dataPeminjaman = [
            'detail_peminjaman' => $detail_peminjaman,
            'barang' => $barang,
            'detail_barang' => $detail_barang,
            'orang' => $siswa
        ];

        // Mengembalikan respons JSON
        return response()->json(['data_peminjaman' => $dataPeminjaman], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
