<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ToolmanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PeminjamanController;

use App\Http\Middleware\CheckRole;

// AUTH

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', [LoginController::class, 'show'])->name('pages.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegistrationController::class, 'show'])->name('pages.register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

Route::get('/get-seri-barang/{id}', [SiswaController::class, 'getSeriBarang'])->name('get-seri-barang');


Route::middleware(['auth'])->group(function () {
    Route::middleware(CheckRole::class . ':Toolman')->group(function () {

        Route::get('/toolman/dashboard', [ToolmanController::class, 'show'])->name('dashboard-tool-man');

        Route::get('/toolman/inventory', [ToolmanController::class, 'showInventory'])->name('inventory-tool-man');
        
        Route::get('/inventory/edit/{id}', [ToolmanController::class, 'editInventory'])->name('edit.inventory');
        Route::post('/inventory/update/{id}', [ToolmanController::class, 'updateInventory'])->name('update.inventory');

        Route::get('/toolman/input-data', [ToolmanController::class, 'showInputData'])->name('input-tool-man');
        Route::post('/toolman/input-data', [ToolmanController::class, 'inputData'])->name('input-data-tool-man');

        Route::get('/toolman/history', [ToolmanController::class, 'showHistory'])->name('history-tool-man');
        Route::get('/peminjaman/{id}/detail', [ToolmanController::class, 'getDetailBarang']);

        Route::post('/peminjaman/approve', [PeminjamanController::class, 'setujuPeminjaman'])->name('peminjaman.approve');
        Route::post('/peminjaman/reject', [PeminjamanController::class, 'tolakPeminjaman'])->name('peminjaman.reject');
        Route::post('/peminjaman/complete', [PeminjamanController::class, 'selesaiPeminjaman'])->name('peminjaman.complete');

        Route::get('/toolman/data-siswa', [ToolmanController::class, 'showSiswa'])->name('inventory-siswa-tool-man');

        Route::get('/toolman/edit-data', function () {
            return view('tool-man.inventory.edit-inventory');
        })->name('edit-inventory');

        Route::get('/toolman/edit-data-siswa', function () {
            return view('tool-man.inventory_siswa.edit-siswa');
        })->name('edit-siswa');
    });

    Route::middleware(CheckRole::class . ':Siswa')->group(function () {

        Route::get('/user/dashboard', [SiswaController::class, 'show'])->name('dashboard-user');

        Route::get('/user/show-data', [SiswaController::class, 'showInventory'])->name('show-user');

        Route::get('/user/input-data', [PeminjamanController::class, 'showInputDataPinjam'])->name('borrow-user');
        Route::post('/user/input-data', [PeminjamanController::class, 'inputDataPinjam'])->name('peminjaman.store');

        Route::get('/user/history', [SiswaController::class, 'showHistory'])->name('history-user');

    });

});
