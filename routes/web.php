<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\ComicController;
use App\Http\Controllers\admin\ChapterController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\LoginController;

// User
Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/details',[UserController::class,'details'])->name('details');
Route::get('/timtruyen',[UserController::class,'timtruyen'])->name('timtruyen');
Route::get('/history',[UserController::class,'history'])->name('history');
Route::get('/chapter',[UserController::class,'chapter'])->name('chapter');
Route::get('/login',[LoginController::class,'login'])->name('login');


// Admin
Route::get('/admin/genres', [GenreController::class, 'index'])->name('admin.genres.index');
Route::get('/admin/genres/create', [GenreController::class, 'create'])->name('admin.genres.create');
Route::post('/admin/genres', [GenreController::class, 'store'])->name('admin.genres.store');
Route::get('/admin/genres/{genre}', [GenreController::class, 'show'])->name('admin.genres.show');
Route::get('/admin/genres/{genre}/edit', [GenreController::class, 'edit'])->name('admin.genres.edit');
Route::put('/admin/genres/{genre}', [GenreController::class, 'update'])->name('admin.genres.update');
Route::delete('/admin/genres/{genre}', [GenreController::class, 'destroy'])->name('admin.genres.destroy');

Route::get('/admin/comics', [ComicController::class, 'index'])->name('admin.comics.index');
Route::get('/admin/comics/create', [ComicController::class, 'create'])->name('admin.comics.create');
Route::post('/admin/comics', [ComicController::class, 'store'])->name('admin.comics.store');
Route::get('/admin/comics/{comic}', [ComicController::class, 'show'])->name('admin.comics.show');
Route::get('/admin/comics/{comic}/edit', [ComicController::class, 'edit'])->name('admin.comics.edit');
Route::put('/admin/comics/{comic}', [ComicController::class, 'update'])->name('admin.comics.update');
Route::delete('/admin/comics/{comic}', [ComicController::class, 'destroy'])->name('admin.comics.destroy');

Route::get('/admin/comics/{comic}/chapters', [ChapterController::class, 'index'])->name('admin.comics.chapters.index');
Route::get('/admin/comics/{comic}/chapters/create', [ChapterController::class, 'create'])->name('admin.comics.chapters.create');
Route::post('/admin/comics/{comic}/chapters', [ChapterController::class, 'store'])->name('admin.comics.chapters.store');
Route::get('/admin/comics/{comic}/chapters/{chapter}', [ChapterController::class, 'show'])->name('admin.comics.chapters.show');
Route::get('/admin/comics/{comic}/chapters/{chapter}/edit', [ChapterController::class, 'edit'])->name('admin.comics.chapters.edit');
Route::put('/admin/comics/{comic}/chapters/{chapter}', [ChapterController::class, 'update'])->name('admin.comics.chapters.update');
Route::delete('/admin/comics/{comic}/chapters/{chapter}', [ChapterController::class, 'destroy'])->name('admin.comics.chapters.destroy');