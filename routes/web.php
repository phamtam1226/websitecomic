<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\ComicController;
use App\Http\Controllers\admin\ChapterController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\LoginController;

// User
Route::get('/',[UserController::class,'index'])->name('index');
// Route::get('/details',[UserController::class,'details'])->name('details');
Route::get('/details/{comicId}', [UserController::class, 'details'])->name('details');

Route::get('/timtruyen',[UserController::class,'timtruyen'])->name('timtruyen');
Route::get('/history',[UserController::class,'history'])->name('history');
Route::get('/chapter',[UserController::class,'chapter'])->name('chapter');
Route::get('/login',[LoginController::class,'login'])->name('login');


// Admin
Route::prefix('admin')->group(function () {
    Route::get('/index', [DashboardController::class, 'admin'])->name('admin.index');
    
    // Genres
    Route::get('/genres', [GenreController::class, 'index'])->name('admin.genres.index');
    Route::get('/genres/create', [GenreController::class, 'create'])->name('admin.genres.create');
    Route::post('/genres', [GenreController::class, 'store'])->name('admin.genres.store');
    Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('admin.genres.show');
    Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('admin.genres.edit');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('admin.genres.update');
    Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('admin.genres.destroy');

    // Comics
    Route::get('/comics', [ComicController::class, 'index'])->name('admin.comics.index');
    Route::get('/comics/create', [ComicController::class, 'create'])->name('admin.comics.create');
    Route::post('/comics', [ComicController::class, 'store'])->name('admin.comics.store');
    Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('admin.comics.show');
    Route::get('/comics/{comic}/edit', [ComicController::class, 'edit'])->name('admin.comics.edit');
    Route::put('/comics/{comic}', [ComicController::class, 'update'])->name('admin.comics.update');
    Route::delete('/comics/{comic}', [ComicController::class, 'destroy'])->name('admin.comics.destroy');
    
    // Chapters
    Route::get('/chapters', [ChapterController::class, 'index'])->name('admin.chapters.index');
    Route::get('/chapters/search', [ChapterController::class, 'search'])->name('admin.chapters.search');
    Route::get('/chapters/{comic}', [ChapterController::class, 'showAll'])->name('admin.chapters.showAll');
    Route::get('/chapters/{comic}/create', [ChapterController::class, 'create'])->name('admin.chapters.create');
    Route::post('/chapters/{comic}', [ChapterController::class, 'store'])->name('admin.chapters.store');
    Route::get('/chapters/{comic}/{chapter}', [ChapterController::class, 'show'])->name('admin.chapters.show');
    Route::get('/chapters/{comic}/{chapter}/edit', [ChapterController::class, 'edit'])->name('admin.chapters.edit');
    Route::put('/chapters/{comic}/{chapter}', [ChapterController::class, 'update'])->name('admin.chapters.update');
    Route::delete('/chapters/{comic}/{chapter}', [ChapterController::class, 'destroy'])->name('admin.chapters.destroy');
});
