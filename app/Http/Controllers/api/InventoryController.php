<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\BarangInventaris;
use App\Models\SeriBarangInventaris;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get the department query parameter
        $department = $request->query('jurusan', '');
    
        // Perform the database query
        $items = DB::table('baranginventaris')
            ->leftJoin('seribaranginventaris', 'seribaranginventaris.id_barang', '=', 'baranginventaris.id')
            ->select(
                'baranginventaris.id',
                'baranginventaris.nama_barang',
                'baranginventaris.gambar_barang',
                DB::raw("COALESCE(SUM(CASE WHEN seribaranginventaris.status = 'Tersedia' THEN 1 ELSE 0 END), 0) AS stok"),
                DB::raw("COALESCE(SUM(CASE WHEN seribaranginventaris.status <> 'Tersedia' THEN 1 ELSE 0 END), 0) AS used")
            )
            ->where('baranginventaris.jurusan', $department)
            ->groupBy('baranginventaris.id', 'baranginventaris.nama_barang', 'baranginventaris.gambar_barang')
            ->get();
    
        // Update the image URL for each item
        foreach ($items as $detail) {
            $detail->gambar_barang;
        }
    
        // Return the JSON response
        return response()->json($items);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request->all());

        $jurusan = $request->input('jurusan');

        if ($request->hasFile('gambar_barang')) {
            $gambarPath = $request->file('gambar_barang')->store('gambar_barang', 'public');
            $gambarUrl = 'storage/' . $gambarPath;
        } else {
            $gambarUrl = null;
        }

        DB::beginTransaction();

        try {
            $barang = new BarangInventaris();
            $barang->nama_barang = $request->input('nama_barang');
            $barang->gambar_barang = $gambarUrl;
            $barang->jurusan = $jurusan;
            $barang->save();

            $barang_id = $barang->id;

            $nomor_seri_array = $request->input('nomor_seri');
            $merk_array = $request->input('merk');

            foreach ($nomor_seri_array as $key => $nomor_seri) {
                $seriBarang = new SeriBarangInventaris();
                $seriBarang->nomor_seri = $nomor_seri;
                $seriBarang->merk = $merk_array[$key];
                $seriBarang->status = 'Tersedia';
                $seriBarang->id_barang = $barang_id;
                $seriBarang->save();
            }

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Item added successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('seribaranginventaris')
            ->join('baranginventaris', 'baranginventaris.id', '=', 'seribaranginventaris.id_barang')
            ->select('seribaranginventaris.nomor_seri', 'seribaranginventaris.merk', 'seribaranginventaris.status')
            ->where('seribaranginventaris.id_barang', $id)
            ->get();

        return response()->json($data);
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
        $nomor_seri = $request->input('nomor_seri');
        $merk = $request->input('merk');
        $nama_barang = $request->input('nama_barang');

        DB::beginTransaction();

        try {
            DB::table('seribaranginventaris')
                ->where('id', $id)
                ->update([
                    'nomor_seri' => $nomor_seri,
                    'merk' => $merk
                ]);

            DB::table('baranginventaris')
                ->where('id', $id)
                ->update(['nama_barang' => $nama_barang]);

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
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
        DB::beginTransaction();

        try {
            DB::table('seribaranginventaris')->where('id_barang', $id)->delete();
            DB::table('baranginventaris')->where('id', $id)->delete();

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function deleteList(Request $request)
    {
        $id = $request->input('id');

        DB::beginTransaction();

        try {
            DB::table('detailpeminjamans')->where('id_seribarang', $id)->delete();
            DB::table('seribaranginventaris')->where('id', $id)->delete();

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function totalItems(Request $request)
    {
        $jurusan = $request->query('jurusan', '');

        if (empty($jurusan)) {
            return response()->json(['error' => 'Jurusan parameter is missing']);
        }

        try {
            $totalRows = DB::table('baranginventaris')
                ->where('jurusan', $jurusan)
                ->count();

            return response()->json(['total_rows' => $totalRows]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch data', 'message' => $e->getMessage()]);
        }
    }
    
    public function listInventoryDetail()
    {
        try {
            // Mengambil data dari database dengan join
            $data = DB::table('seribaranginventaris')
                ->join('baranginventaris', 'seribaranginventaris.id_barang', '=', 'baranginventaris.id')
                ->select(
                    'seribaranginventaris.id',
                    'seribaranginventaris.id_barang',
                    'seribaranginventaris.nomor_seri',
                    'seribaranginventaris.merk',
                    'seribaranginventaris.status'
                )
                ->get();

            // Mengecek apakah data ada atau tidak
            if ($data->isEmpty()) {
                return response()->json(['error' => 'No data found']);
            }

            // Mengembalikan data dalam format JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Mengembalikan pesan error jika ada masalah
            return response()->json(['error' => 'Unable to fetch data', 'message' => $e->getMessage()]);
        }
    }
}
?>
