<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/view-marker',[ApiController::class,'ViewMarker']);
Route::get('/ikan-marker',[ApiController::class,'ViewMarkerIkan']);
Route::get('/kategori-marker',[ApiController::class,'ViewMarkerKategori']);
Route::get('/getDesa',[ApiController::class,'getDesa']);
Route::get('/getKelompok',[ApiController::class,'getKelompok']);
Route::get('/getData',[ApiController::class,'getData']);
Route::get('/getDataByKategori/{category:slug}',[ApiController::class,'getDataByKategori']);
Route::get('/getDataByIkan/{ikan:slug}',[ApiController::class,'getDataByIkan']);
Route::get('/getDataByPetugas/{petugas:username}',[ApiController::class,'getDataByPetugas']);

