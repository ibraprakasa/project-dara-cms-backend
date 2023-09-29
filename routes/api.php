<?php

use App\Http\Controllers\LupaPasswordControllerMobile;
use App\Http\Controllers\PendonorControllerMobile;
use App\Http\Controllers\BeritaControllerMobile;
use App\Http\Controllers\JadwalDonorDarahControllerMobile;
use App\Http\Controllers\JadwalDonorPendonorControllerMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/login", [PendonorControllerMobile::class, 'login']);
Route::get("/logout", [PendonorControllerMobile::class, 'logout']);
Route::get("/home", [PendonorControllerMobile::class, 'home']);
Route::get('/berita', [BeritaControllerMobile::class, 'show']);

//untuk menu lokasi donor
Route::get('/jadwal-donor-darah', [JadwalDonorDarahControllerMobile::class, 'show']);

Route::get('/jadwal-donor-pendonor/{id}/{idl}', [JadwalDonorPendonorControllerMobile::class, 'check']);
Route::post('/jadwal-donor-pendonor', [JadwalDonorPendonorControllerMobile::class, 'daftar']);
Route::get('/jadwal-donor-pendonor/{id}', [JadwalDonorPendonorControllerMobile::class, 'find']);

Route::get('/profile', [PendonorControllerMobile::class, 'showProfile']);
Route::post('/profile-edit-gambar', [PendonorControllerMobile::class, 'updateGambar']);
Route::post('/profile-edit-data', [PendonorControllerMobile::class, 'updateData']);
Route::post('/profile-edit-password', [PendonorControllerMobile::class, 'editPassword']);

Route::post('/otp/send', [LupaPasswordControllerMobile::class, 'sendOtp']);
Route::post('/otp/check', [LupaPasswordControllerMobile::class, 'checkOtp']);
Route::post('/otp/reset-password', [LupaPasswordControllerMobile::class, 'resetPassword']);
