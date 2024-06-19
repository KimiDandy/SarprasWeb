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
class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get the department from the request
        $jurusan = $request->query('jurusan');
    
        // Query to get the data from the database, filtered by the department if provided
        $query = DB::table('peminjamans')
                    ->join('users', 'users.id', '=', 'peminjamans.id_user')
                    ->join('siswas', 'users.id', '=', 'siswas.id_user')
                    ->select('peminjamans.id as id_pemesanan', 'siswas.nama', 'siswas.kelas', 'siswas.nomor_hp', 'siswas.jurusan','peminjamans.tanggal_pinjam','peminjamans.tanggal_kembali')
                    ->where('peminjamans.status_perizinan', '=', 'Menunggu');
    
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
        ->where('peminjamans.id', $id)
        ->select(
            'baranginventaris.gambar_barang',
            'baranginventaris.nama_barang',
            'seribaranginventaris.nomor_seri',
            'seribaranginventaris.merk',
            'peminjamans.status_perizinan',  // Changed from 'peminjaman' to 'peminjamans'
            'peminjamans.status_peminjaman' // Changed from 'peminjaman' to 'peminjamans'
        )
        ->get();

    // Append base URL to gambar_barang
    $baseUrl = 'http://192.168.1.124:8000/';
    foreach ($details as $detail) {
        $detail->gambar_barang;
    }

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
    
public function update($id)
{
    try {
        // Start a transaction
        DB::beginTransaction();

        // Update the peminjamans table
        Peminjaman::where('id', $id)->update([
            'status_perizinan' => 'Disetujui',
            'status_peminjaman' => 'Berlangsung'
        ]);

        // Update the seribaranginventaris table using the related detailpeminjamans records
        DB::table('seribaranginventaris')
            ->join('detailpeminjamans', 'seribaranginventaris.id', '=', 'detailpeminjamans.id_seribarang')
            ->join('peminjamans', 'peminjamans.id', '=', 'detailpeminjamans.id_peminjaman')
            ->where('peminjamans.id', $id)
            ->update(['seribaranginventaris.status' => 'Dipinjam']);

        // Commit the transaction
        DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Peminjaman updated successfully',
        ], 200); // OK
    } catch (\Throwable $th) {
        // Rollback the transaction in case of an error
        DB::rollBack();

        return response()->json([
            'status' => false,
            'message' => 'Failed to update peminjaman',
            'error' => $th->getMessage()
        ], 500); // Internal Server Error
    }
}




    // public function UpdateTolak($id)
    // {
    //     // Mencari peminjaman berdasarkan ID
    //     $peminjaman = Peminjaman::find($id);

    //     if (!$peminjaman) {
    //         return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
    //     }

    //     // Mengupdate status_peminjaman dan status_perizinan
    //     $peminjaman->status_peminjaman = 'Ditolak';
    //     $peminjaman->save();

    //     return response()->json(['message' => 'Status peminjaman diperbarui', 'data' => $peminjaman], 200);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
