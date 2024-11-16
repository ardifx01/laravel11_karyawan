<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});
Route::resource('/', IndexController::class);


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/data', [IndexController::class, 'listData'])->name('listData');

Route::post('/input', [IndexController::class, 'input'])->name('input');

Route::get('/login' , [LoginController::class, 'login'])->name('login');
Route::post('/login/auth' , [LoginController::class, 'auth'])->name('login.auth');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/admin/table', [AdminController::class, 'tables'])->name('tables');

Route::post('/admin/delete/{id_karyawan}', [AdminController::class, 'delete'])->name('delete');

Route::get('/admin/edit/{id_karyawan}', [AdminController::class, 'edit'])->name('edit');

Route::post('/admin/edit/update/{id_karyawan}', [AdminController::class, 'update'])->name('update');
