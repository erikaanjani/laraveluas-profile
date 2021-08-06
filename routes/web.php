<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PendidikansController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\KontaksController;
use Illuminate\Support\Facades\Route;

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

Route::get('', [ProfilesController::class, 'index']);
//Route::get('/Profiles', [StudentController::class, 'index']);
//Route::get('/Profiles/create', [StudentController::class, 'create']);
//Route::post('/Profiles', [StudentController::class, 'store']);
//Route::get('/Profiles/{id}', [StudentController::class, 'show']);
//Route::get('/Profiles/{id}/edit', [StudentController::class, 'edit']);
//Route::put('/Profiles/{id}', [StudentController::class, 'update']);
//Route::delete('/Profiles/{id}', [StudentController::class, 'destroy']);
Route::resources([
    'Profiles' => ProfilesController::class,
    'absens' => AbsensController::class,
    'pendidikans' => PendidikansController::class,
    'works' => WorksController::class,
    'kontaks' => KontaksController::class,

]);
Route::get('/absens/addmember/{absen}', [AbsensController::class, 'addmember']);
Route::put('/absens/addmember/{absen}', [AbsensController::class, 'updateaddmember']);
Route::put('/absens/deleteaddmember/{absen}', [AbsensController::class, 'deleteaddmember']);