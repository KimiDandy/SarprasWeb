<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ToolmanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// AUTH

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::redirect('/', '/toolman/dashboard');

Route::get('/login', [LoginController::class, 'show'])->name('pages.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegistrationController::class, 'show'])->name('pages.register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

// TOOLMAN

Route::get('/toolman/dashboard', [ToolmanController::class, 'show'])->name('dashboard-tool-man');

Route::get('/toolman/inventory', [ToolmanController::class, 'showInventory'])->name('inventory-tool-man');
Route::get('/get-seri-barang/{id}', [ToolmanController::class, 'getSeriBarang'])->name('get-seri-barang');


Route::get('/toolman/input-data', [ToolmanController::class, 'showInputData'])->name('input-tool-man');
Route::post('/toolman/input-data', [ToolmanController::class, 'inputData'])->name('input-data-tool-man');

Route::get('/toolman/history', [ToolmanController::class, 'showHistory'])->name('history-tool-man');


//USER
Route::get('/user/input-data', function () {
    return view('user.borrow.borrow-user');
})->name('borrow-user');

Route::get('/user/show-data', function () {
    return view('user.show-inventory.show-data-user');
})->name('show-user');

Route::get('/user/history', function () {
    return view('user.history-borrow.history-user');
})->name('history-user');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard-user');
