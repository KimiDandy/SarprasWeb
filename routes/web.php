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

Route::get('/toolman/edit-data', function () {
    return view('tool-man.inventory.edit-inventory');
})->name('edit-inventory');


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
