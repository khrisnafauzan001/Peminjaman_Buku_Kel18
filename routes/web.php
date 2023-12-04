<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BinController;
use App\Http\Controllers\IceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\peminjamanController;




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

Route::get('/', [Controller::class, 'viewLogin'])->name('login');
Route::post('/', [Controller::class, 'auth'])->name('auth');

Route::group(['middleware' => 'web'],function() {

    Route::get('/adminHome', [AdminController::class, 'viewHome'])->name('admin.home');
    Route::get('/adminMahasiswa', [AdminController::class, 'viewMahasiswa'])->name('admin.mahasiswa');
    Route::get('/adminPeminjaman', [AdminController::class, 'viewPeminjaman'])->name('admin.peminjaman');


    Route::get('/bin', [AdminController::class, 'viewBin'])->name('admin.bin');
    Route::post('/insertMahasiswa-{status}', [MahasiswaController::class, 'insert'])->name('admin.insertMahasiswa');


    Route::get('/add-{status}', [AdminController::class, 'viewAdd'])->name('admin.add');
    Route::get('/addMahaiswa-{status}', [AdminController::class, 'viewAddMahasiswa'])->name('mahasiswa.addMahasswa');
    Route::post('/insert-{status}', [BukuController::class, 'insert'])->name('admin.insert');

    Route::get('/addPeminjaman-{status}', [AdminController::class, 'viewAddPeminjaman'])->name('peminjaman.addPeminjaman');
    Route::post('/insertPeminjaman-{status}', [PeminjamanController::class, 'insertPeminjaman'])->name('peminjaman.insertPeminjaman');

    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('editMahasiswa/{id}', [AdminController::class, 'editMahasiswa'])->name('mahasiswa.edit');
    Route::post('update/{id}', [BukuController::class, 'update'])->name('admin.update');
    Route::post('updateMahasiswa/{id}', [mahasiswaController::class, 'update'])->name('mahasiswa.update');


    Route::get('softDelete/{id}', [BukuController::class, 'softDelete'])->name('admin.softDelete');
    Route::get('softDeleteMahasiswa/{id}', [MahasiswaController::class, 'softDelete'])->name('mahasiswa.softDelete');


    Route::get('delete/{id}', [BukuController::class, 'hardDelete'])->name('admin.hardDelete');
    Route::get('deleteMahasiswa/{id}', [MahasiswaController::class, 'hardDelete'])->name('mahasiswa.hardDelete');
    Route::get('/logout', [Controller::class, 'logout'])->name('logout');


    Route::get('restore/{id}', [BukuController::class, 'restore'])->name('admin.restore');
    Route::get('restoreMahasiswa/{id}', [MahasiswaController::class, 'restore'])->name('mahasiswa.restore');


    Route::get('search-{status}', [BukuController::class, 'search'])->name('admin.search');
    Route::get('searchMahasiswa{status}', [MahasiswaController::class, 'search'])->name('mahasiswa.search');
    Route::get('searchPeminjaman{status}', [peminjamanController::class, 'search'])->name('peminjaman.search');



});


