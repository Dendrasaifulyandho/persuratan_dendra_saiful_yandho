<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

//Buat Route untuk  menampilkan form login dengan nama route 'login'
Route::get('/login',[AuthController::class,'index'])->name('login');
//POST LOGIN untuk check password
Route::post('/login',[AuthController::class,'check']);
//ROUTE LOGOUT
Route::get('/logout',[AuthController::class,'logout']);
//=================
//Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/', [DashboardController::class, 'index']);


Route::get('/dashboard/surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('/dashboard/surat/tambah', [SuratController::class, 'tambah'])->name('surat.tambah');
Route::post('/dashboard/surat', [SuratController::class, 'store'])->name('surat.store');
Route::get('/dashboard/surat/edit/{id}', [SuratController::class, 'edit'])->name('surat.edit');
Route::put('/dashboard/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
Route::delete('/dashboard/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
//Route::delete('/dashboard/surat/{id}', [SuratController::class, 'destroy']);

//Route::delete('/dashboard/surat/hapus/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');



// Route::get('/surat',[SuratController::class,'index']);
// Route::get('/surat/edit',[SuratController::class,'edit']);
// Route::post('/sura   t/simpan',[SuratController::class,'simpan']);
//Cabang
// Route::get('/surat',[SuratController::class,'index']);
// Route::get('/surat/tambah',[SuratController::class,'tambah']);
// Route::post('/surat/simpan',[SuratController::class,'simpan']);
// Route::get('/surat/edit/{id}',[SuratController::class,'edit']);
// Route::delete('/surat/hapus/{id}',[SuratController::class,'hapus']);

//Barang
// Route::get('/barang',[BarangController::class,'index']);
// Route::get('/barang/tambah',[BarangController::class,'tambah']);
// Route::post('/barang/simpan',[BarangController::class,'simpan']);
// Route::get('/barang/edit/{id}',[BarangController::class,'edit']);
// Route::delete('/barang/hapus/{id}',[BarangController::class,'hapus']);
    