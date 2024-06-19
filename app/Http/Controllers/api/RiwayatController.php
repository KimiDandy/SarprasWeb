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
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function index(Request $request)
    {
        // Get the department from the request
        $jurusan = $request->query('jurusan');
    
        // Query to get the data from the database, filtered by the department if provided
        $query = DB::table('peminjamans')
                    ->join('users', 'users.id', '=', 'peminjamans.id_user')
                    ->join('siswas', 'users.id', '=', 'siswas.id_user')
                    ->select('peminjamans.id as id_pemesanan', 'siswas.nama', 'siswas.kelas', 'siswas.nomor_hp', 'siswas.jurusan','peminjamans.tanggal_pinjam','peminjamans.tanggal_kembali')
                    ->where('peminjamans.status_perizinan', '=', 'Disetujui')
                    ->where('peminjamans.status_peminjaman', '=', 'Selesai');
    
        // Apply the department filter if it's provided
        if (!empty($jurusan)) {
            $query->where('siswas.jurusan', '=', $jurusan);
        }
    
        // Get the results
        $siswa = $query->get();
    
        // Return the data as JSON
        return response()->json($siswa, 200);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fetch details using joins between the necessary tables
        $details = Peminjaman::join('detailpeminjamans', 'peminjamans.id', '=', 'detailpeminjamans.id_peminjaman')
            ->join('baranginventaris', 'baranginventaris.id', '=', 'detailpeminjamans.id_barang')
            ->join('seribaranginventaris', 'seribaranginventaris.id', '=', 'detailpeminjamans.id_seribarang')
            ->join('users', 'users.id', '=', 'peminjamans.id_user')
            ->join('siswas', 'siswas.id_user', '=', 'users.id')
            ->where('peminjamans.id', $id)
            ->select(
                'siswas.nama',
                'siswas.kelas',
                'siswas.nomor_hp',
                'baranginventaris.nama_barang',
                'seribaranginventaris.nomor_seri',
                'seribaranginventaris.merk',
                'peminjamans.tanggal_pinjam',
                'peminjamans.tanggal_kembali',
                'peminjamans.status_peminjaman'
            )
            ->get();
    
        // Return the details as a JSON response
        return response()->json($details, 200);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
