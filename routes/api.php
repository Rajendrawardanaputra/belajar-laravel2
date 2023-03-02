<?php
use App\Http\Controllers\KelasController;   
use App\Http\Controllers\SiswaController;   
use App\Http\Controllers\BukuController;   
use App\Http\Controllers\PeminjamanController;   
use App\Http\Controllers\DetailpeminjamanController; 
use App\Http\Controllers\UserController; 
  

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

//     Route::post('register',[UserController::class,'register']);
//     Route::post('login',[UserController::class,'login']);
//     Route::post('logout',[UserController::class,'logout']);
//     Route::post('refresh',[UserController::class,'refresh']);
//     Route::post('me', [UserController::class,'me']);
 
// });

Route::get('/getsiswa',[SiswaController::class,'getsiswa']);
Route::get('/detailsiswa/{id_siswa}',[SiswaController::class,'detailsiswa']);
Route::post('/createsiswa',[SiswaController::class,'createsiswa']);
Route::put('/updatesiswa/{id_siswa}',[SiswaController::class,'updatesiswa']);
Route::delete('/deletesiswa/{id_siswa}',[SiswaController::class,'deletesiswa']);

Route::get('/getkelas',[KelasController::class,'getkelas']);
Route::post('/createkelas',[KelasController::class,'createkelas']);
Route::put('/updatekelas/{id_kelas}',[KelasController::class,'updatekelas']);
Route::delete('/deletekelas/{id_kelas}',[KelasController::class,'deletekelas']);

Route::get('/getbuku',[BukuController::class,'getbuku']);
Route::post('/createbuku',[BukuController::class,'createbuku']);
Route::put('/updatebuku/{id_buku}',[BukuController::class,'updatebuku']);
Route::delete('/deletebuku/{id_buku}',[BukuController::class,'deletebuku']);

Route::get('/getpeminjaman/{id}',[PeminjamanController::class,'getpeminjaman']);
Route::post('/createpeminjaman',[PeminjamanController::class,'createpeminjaman']);
Route::put('/kembalipeminjaman/{id_peminjaman}',[PeminjamanController::class,'kembalipeminjaman']);
Route::delete('/deletepeminjaman/{id_peminjaman}',[PeminjamanController::class,'deletepeminjaman']);

