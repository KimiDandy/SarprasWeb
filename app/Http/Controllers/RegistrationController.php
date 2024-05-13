<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Toolman;

class RegistrationController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Log::info($request);
        $validatedData = $request->validate([
            'role' => 'required|in:Siswa,Toolman',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'role' => $validatedData['role'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ]);

        if ($validatedData['role'] === 'Siswa') {
            Siswa::create([
                'nisn' => $request->nisn,
                'nama' => $request->nama_lengkap_siswa,
                'kelas' => $request->kelas,
                'nomor_hp' => $request->nomor_handphone_siswa,
                'jurusan' => $request->jurusan,
                'id_user' => $user->id,
            ]);
        } elseif ($validatedData['role'] === 'Toolman') {
            Toolman::create([
                'nama' => $request->nama_lengkap_toolman,
                'nomor_hp' => $request->nomor_handphone_toolman,
                'jurusan' => $request->jurusan,
                'id_user' => $user->id,
            ]);
        }
        return redirect()->route('pages.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
