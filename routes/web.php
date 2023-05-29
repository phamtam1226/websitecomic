<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\ComicController;
use App\Http\Controllers\admin\ChapterController;
use App\Http\Controllers\user\UserController;


Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/details',[UserController::class,'details'])->name('details');
Route::get('/timtruyen',[UserController::class,'timtruyen'])->name('timtruyen');
Route::get('/history',[UserController::class,'history'])->name('history');
Route::get('/chapter',[UserController::class,'chapter'])->name('chapter');

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');

Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('/comics/create', [ComicController::class, 'create'])->name('comics.create');
Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');
Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('comics.show');
Route::get('/comics/{comic}/edit', [ComicController::class, 'edit'])->name('comics.edit');
Route::put('/comics/{comic}', [ComicController::class, 'update'])->name('comics.update');
Route::delete('/comics/{comic}', [ComicController::class, 'destroy'])->name('comics.destroy');

Route::get('/comics/{comic}/chapters', [ChapterController::class, 'index'])->name('comics.chapters.index');
Route::get('/comics/{comic}/chapters/create', [ChapterController::class, 'create'])->name('comics.chapters.create');
Route::post('/comics/{comic}/chapters', [ChapterController::class, 'store'])->name('comics.chapters.store');
Route::get('/comics/{comic}/chapters/{chapter}', [ChapterController::class, 'show'])->name('comics.chapters.show');
Route::get('/comics/{comic}/chapters/{chapter}/edit', [ChapterController::class, 'edit'])->name('comics.chapters.edit');
Route::put('/comics/{comic}/chapters/{chapter}', [ChapterController::class, 'update'])->name('comics.chapters.update');
Route::delete('/comics/{comic}/chapters/{chapter}', [ChapterController::class, 'destroy'])->name('comics.chapters.destroy');