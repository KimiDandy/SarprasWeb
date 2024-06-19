<?php

use App\Http\Controllers\api\DipinjamController;
use App\Http\Controllers\api\RegistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\api\InventoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/pengajuan', App\Http\Controllers\api\PengajuanController::class);
Route::apiResource('/dipinjam', App\Http\Controllers\api\DipinjamController::class);
Route::apiResource('/riwayat', App\Http\Controllers\api\RiwayatController::class);
Route::apiResource('/inventory', App\Http\Controllers\api\InventoryController::class);
Route::get('/user/toolman', [LoginController::class, 'show']);
Route::get('/user', [RegistController::class, 'showUser']);

Route::post('/store', [RegistController::class, 'store']);
Route::put('/store/barang/{id}', [DipinjamController::class, 'updateBarang']);
Route::put('/store/barangUn/{id}', [DipinjamController::class, 'updateBarangUn']);
Route::post('/login', [RegistController::class, 'login']);
Route::get('/toolman', [RegistController::class, 'getUserDetails']);

Route::prefix('inventory')->group(function () {
    Route::get('/', [InventoryController::class, 'index']);
    Route::post('/', [InventoryController::class, 'store']);
    Route::get('/{id}', [InventoryController::class, 'show']);
    Route::put('/{id}', [InventoryController::class, 'update']);
    Route::delete('/{id}', [InventoryController::class, 'destroy']);
    Route::delete('/delete-list', [InventoryController::class, 'deleteList']);
    Route::get('/total-items', [InventoryController::class, 'totalItems']);
    Route::get('/list-inventory-detail', [InventoryController::class, 'listInventoryDetail']);
});

// Route::get('/inventory', [App\Http\Controllers\api\ApiInventoryController::class, 'showvalue']);
// Route::get('/bang/{id}', [App\Http\Controllers\api\ApiInventoryController::class, 'soya']);