<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Toolman;
use Illuminate\Support\Facades\Validator;

class RegistrationControllerMob extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $validator = Validator::make($request->all(), [
    
        'nama'     => 'required',
        'nomor_hp'   => 'required',
        'jurusan'   => 'required',
        'id_user'   => 'required',
    ]);

    //check if validation fails
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    //upload image
 

    //create post
    // $pendidikan = Pendidikan::create([
        
    //     'nama'     => $request->nama,
    //     'tingkatan'   => $request->tingkatan,
    //     'tahun_masuk'   => $request->tahun_masuk,
    //     'tahun_keluar'   => $request->tahun_keluar,
    // ]);

    $Toolman=Toolman::create([
        'nama' => $request->nama_lengkap_toolman,
        'nomor_hp' => $request->nomor_handphone_toolman,
        'jurusan' => $request->jurusan,
        'id_user' => $user->id,
    ]);

    //return response
    return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $pendidikan);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
