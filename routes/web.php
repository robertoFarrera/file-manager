<?php

use App\Http\Controllers\FileController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [FileController::class, 'index'])->name('home');
Route::get('files/{file}', [FileController::class, 'download'])->name('files.download');
Route::post('files', [FileController::class, 'store'])->name('files.store');
Route::delete('files/{file}', [FileController::class, 'destroy'])->name('files.destroy');