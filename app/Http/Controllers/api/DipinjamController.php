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

class DipinjamController extends Controller
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
                ->where('peminjamans.status_perizinan', 'Disetujui')
                ->where('peminjamans.status_peminjaman', 'Berlangsung');

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
        $details = Peminjaman::join('detailpeminjamans', 'peminjamans.id', '=', 'detailpeminjamans.id_peminjaman')
        ->join('baranginventaris', 'baranginventaris.id', '=', 'detailpeminjamans.id_barang')
        ->join('seribaranginventaris', 'seribaranginventaris.id', '=', 'detailpeminjamans.id_seribarang')
        ->where('peminjamans.id', $id)
        ->select('seribaranginventaris.id as id_seribarang','baranginventaris.gambar_barang', 'baranginventaris.nama_barang', 'seribaranginventaris.nomor_seri', 'seribaranginventaris.merk')
        ->get();
      
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
                'status_peminjaman' => 'Selesai',
            ]);
    
            // Update the seribaranginventaris table using the related detailpeminjamans records
            DB::table('seribaranginventaris')
                ->join('detailpeminjamans', 'seribaranginventaris.id', '=', 'detailpeminjamans.id_seribarang')
                ->join('peminjamans', 'peminjamans.id', '=', 'detailpeminjamans.id_peminjaman')
                ->where('peminjamans.id', $id)
                ->update(['seribaranginventaris.status' => 'Tersedia']);
    
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
    
    public function updateBarang(Request $request, $id)
    {
        try {
            // Start a transaction
            DB::beginTransaction();
    
            // Validate the request data
            $request->validate([
                'nomor_seri' => 'required|string',  // Adjust validation as needed
            ]);
    
            // Update the seribaranginventaris table using the related detailpeminjamans records
            $updated = DB::table('seribaranginventaris')
                ->join('detailpeminjamans', 'seribaranginventaris.id', '=', 'detailpeminjamans.id_seribarang')
                ->join('peminjamans', 'peminjamans.id', '=', 'detailpeminjamans.id_peminjaman')
                ->where('detailpeminjamans.id_peminjaman', $id)
                ->where('seribaranginventaris.nomor_seri', $request->nomor_seri)
                ->update(['seribaranginventaris.status' => 'Tersedia']);
    
            if ($updated === 0) {
                // If no rows were updated, rollback and return an error
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to update barang. No matching records found.',
                ], 404); // Not Found
            }
    
            // Commit the transaction
            DB::commit();
    
            return response()->json([
                'status' => true,
                'message' => 'Barang updated successfully',
            ], 200); // OK
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
    
            return response()->json([
                'status' => false,
                'message' => 'Failed to update barang',
                'error' => $e->getMessage()
            ], 500); // Internal Server Error
        }
    }
    public function updateBarangUn(Request $request, $id)
    {
        try {
            // Start a transaction
            DB::beginTransaction();
    
            // Validate the request data
            $request->validate([
                'nomor_seri' => 'required|string',  // Adjust validation as needed
            ]);
    
            // Update the seribaranginventaris table using the related detailpeminjamans records
            $updated = DB::table('seribaranginventaris')
                ->join('detailpeminjamans', 'seribaranginventaris.id', '=', 'detailpeminjamans.id_seribarang')
                ->join('peminjamans', 'peminjamans.id', '=', 'detailpeminjamans.id_peminjaman')
                ->where('detailpeminjamans.id_peminjaman', $id)
                ->where('seribaranginventaris.nomor_seri', $request->nomor_seri)
                ->update(['seribaranginventaris.status' => 'Dipinjam']);
    
            if ($updated === 0) {
                // If no rows were updated, rollback and return an error
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to update barang. No matching records found.',
                ], 404); // Not Found
            }
    
            // Commit the transaction
            DB::commit();
    
            return response()->json([
                'status' => true,
                'message' => 'Barang updated successfully',
            ], 200); // OK
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
    
            return response()->json([
                'status' => false,
                'message' => 'Failed to update barang',
                'error' => $e->getMessage()
            ], 500); // Internal Server Error
        }
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
