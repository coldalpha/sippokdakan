<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PokdakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PercobaanController;
use App\Http\Controllers\PokdakanPostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// -----------------API
Route::get('/getDataByKategori/{category:slug}',[ApiController::class,'getDataByKategori']);
Route::get('/getDataByIkan/{ikan:slug}',[ApiController::class,'getDataByIkan']);
Route::get('/getDataByUser/{user:username}',[ApiController::class,'getDataByUser']);
Route::get('/findDesa',[PokdakanController::class,'findDesa']);

// -----------------Front End
Route::get('/',[HomeController::class,'index']);
Route::get('/Data',[HomeController::class,'DataIndex']);
Route::get('/Data/{Pokdakan:slug}', [HomeController::class,'DataDetail']);
Route::get('/Data/Kategori/{category:slug}', [HomeController::class,'KategoriIndex']);
Route::get('/Data/Ikan/{ikan:slug}',[HomeController::class,'IkanIndex']);
Route::get('/Data/Petugas/{petugas:username}',[HomeController::class,'PetugasIndex']);


// -----------------Authentication
Route::get('/login',[AuthController::class,'Login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'authenticate']);
Route::get('/register',[AuthController::class,'Register'])->middleware('guest');
Route::post('/register',[AuthController::class,'RegisterStore']);
Route::get('/forgot',[AuthController::class,'ForgotPassword'])->middleware('guest');
Route::get('/logout',[AuthController::class,'Logout'])->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
    Route::get('user/changepassword',[UserController::class,'editPassword'])
        ->name('user.password.edit');

    Route::patch('user/changepassword',[UserController::class,'updatePassword'])
        ->name('user.password.update');
});

// -----------------Admin Page
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::get('/pokdakan/setujui/{pokdakan:slug}', [PokdakanController::class,'Setujui']);
Route::get('/pokdakan/tolak/{pokdakan:slug}', [PokdakanController::class,'Tolak']);

Route::resource('/pokdakan',PokdakanController::class)->middleware('auth');
Route::get('/createSlugKelompok',[PokdakanController::class,'createSlug'])->middleware('auth');

Route::resource('/ikan',IkanController::class)->middleware('admin');
Route::get('/createSlugIkan',[IkanController::class,'createSlug']);

Route::get('/pokdakan/delete/{pokdakan:slug}', [PokdakanController::class,'destroy']);
Route::resource('/category',CategoryController::class)->middleware('admin');
Route::get('/createSlugCategory',[CategoryController::class,'createSlug']);

Route::resource('/user',UserController::class)->middleware('auth');;


Route::get('/map',[PetugasController::class,'viewmarker']);
Route::resource('/petugas',PetugasController::class)->middleware('admin');


