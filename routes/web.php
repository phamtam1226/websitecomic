<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
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

Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/details',[UserController::class,'details'])->name('details');
Route::get('/timtruyen',[UserController::class,'timtruyen'])->name('timtruyen');
Route::get('/history',[UserController::class,'history'])->name('history');
Route::get('/chapter',[UserController::class,'chapter'])->name('chapter');
