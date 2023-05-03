<?php

use App\Http\Controllers\Api\SiswaController;
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

Route::get('siswa', [SiswaController::class, 'index']);
Route::post('siswa/store', [SiswaController::class, 'store']);
Route::get('siswa/show/{id}', [SiswaController::class, 'show']);
Route::post('siswa/update/{id}', [SiswaController::class, 'update']);
Route::post('siswa/destroy/{id}', [SiswaController::class, 'destroy']);
