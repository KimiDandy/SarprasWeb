<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Toolman;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Mencari user berdasarkan username
    $user = User::where('username', $request->username)->first();

    // Verifikasi user dan password tanpa hash
    if (!$user || $request->password !== $user->password) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Verifikasi apakah user adalah toolman
    if (!$user->isToolman()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    // Mengambil relasi toolman dari model User
    $toolman = $user->toolman;

    // Membuat token otentikasi
    $token = $user->createToken('authToken')->plainTextToken;

    // Mengembalikan respons sukses
    return response()->json([
        'success' => true,
        'message' => 'Login successful',
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => [
            'id' => $user->id,
            'username' => $user->username,
            'nama' => $toolman->nama, // Asumsi bahwa 'toolman' memiliki atribut 'nama'
            'jurusan' => $toolman->jurusan, // Asumsi bahwa 'toolman' memiliki atribut 'jurusan'
        ],
    ]);
}

    
    public function show(Request $request)
    {
        // Get the user ID from the request
        $userId = $request->query('user_id', 0);

        if ($userId > 0) {
            $toolmen = Toolman::where('id_user', $userId)->get(['id', 'nama', 'nomor_hp', 'jurusan']);

            if ($toolmen->isNotEmpty()) {
                return response()->json($toolmen);
            } else {
                return response()->json(['error' => 'No records found'], 404);
            }
        } else {
            return response()->json(['error' => 'Invalid user ID'], 400);
        }
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
    
    // Helper method to validate the password (assuming bcrypt hashing)
    protected function validatePassword($inputPassword, $storedPasswordHash)
    {
        return \Illuminate\Support\Facades\Hash::check($inputPassword, $storedPasswordHash);
    }
}
