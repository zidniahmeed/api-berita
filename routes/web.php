<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenulisController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//route tipe
Route::get('/tipe',[TipeController::class, 'index']);
Route::post('/tipe',[TipeController::class, 'store']);
Route::get('/deletetipe/{id}',[TipeController::class, 'delete']);

//route penulis
Route::get('/penulis',[PenulisController::class, 'index']);
Route::get('/deletepenulis/{id}',[PenulisController::class, 'delete']);

//route berita
Route::get('/berita',[BeritaController::class, 'index'])->name('berita');
Route::get('/createberita',[BeritaController::class, 'create']);
Route::post('/createberita',[BeritaController::class, 'store']);
Route::get('/infoberita/{id}',[BeritaController::class, 'show']);
Route::get('/editberita/{id}',[BeritaController::class, 'edit']);
Route::post('/editberita/{id}',[BeritaController::class, 'update']);
Route::get('/deleteberita/{id}',[BeritaController::class, 'delete']);

Route::post('/setstatus/{id}',[BeritaController::class, 'setstatus']);




Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
