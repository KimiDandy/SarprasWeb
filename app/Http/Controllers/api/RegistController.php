<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Toolman;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;  
class RegistController extends Controller
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
    public function getUserDetails(Request $request)
    {
        $userId = $request->query('id_user');

        if (!$userId) {
            return response()->json(['error' => 'User ID is required'], 400);
        }

        $toolman = Toolman::where('id_user', $userId)->first();

        if (!$toolman) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'nama' => $toolman->nama,
            'jurusan' => $toolman->jurusan,
        ], 200);
    }
    
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Attempt to find the user
        $user = User::where('username', $request->username)->first();
    
        // Check if the user exists and the role is 'Toolman'
        if (!$user || $user->role !== 'Toolman') {
            return response()->json(['error' => 'Invalid credentials or unauthorized role'], 401);
        }
    
        // Verify the password (without hash)
        if ($request->password !== $user->password) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    
        // Get the toolman data based on user_id
        $toolman = Toolman::where('id_user', $user->id)->first();
    
        if (!$toolman) {
            return response()->json(['error' => 'Toolman data not found'], 404);
        }
    
        // Generate token
        $token = $user->createToken('authToken')->plainTextToken;
    
        // Return response with the token and user information
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'nama' => $toolman->nama, // Assuming 'toolman' has 'nama' attribute
                'jurusan' => $toolman->jurusan, // Assuming 'toolman' has 'jurusan' attribute
            ],
        ], 200);
    }
     
    public function showUser(Request $request)
{
    // Mengambil user_id dari query parameter
    $userId = $request->query('id_user');

    if ($userId) {
        // Mengambil data user dari database
        $user = DB::table('toolmans')->where('id_user', $userId)->first();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'User ID not found in query parameter'
        ], 400);
    }
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap_toolman' => 'required',
            'nomor_handphone_toolman' => 'required',
            'jurusan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Create the User instance
        $user = User::create([
            'role' => 'Toolman',
            'username' => $request->username,
            'password' => $request->password,
        ]);
    
        // Create the Toolman instance
        $toolman = Toolman::create([
            'nama' => $request->nama_lengkap_toolman,
            'nomor_hp' => $request->nomor_handphone_toolman,
            'jurusan' => $request->jurusan,
            'id_user' => $user->id,
        ]);
    
        // Return response
        return response()->json(['success' => true, 'message' => 'Data Post Berhasil Ditambahkan!', 'data' => $toolman], 201);
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
