<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// TOOLMAN
Route::get('/toolman/dashboard', function () {
    return view('tool-man.dashboard');
})->name('dashboard-tool-man');

Route::get('/toolman/history', function () {
    return view('tool-man.history.history-data');
})->name('history-tool-man');

Route::get('/toolman/inventory', function () {
    return view('tool-man.inventory.inventory-data');
})->name('inventory-tool-man');

Route::get('/toolman/input-data', function () {
    return view('tool-man.tool.input-tool');
})->name('input-tool-man');
