<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\ComicController;
use App\Http\Controllers\admin\ChapterController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\LoginController;

// User
Route::get('/',[UserController::class,'index'])->name('user.index');
Route::get('/details/{comicId}', [UserController::class, 'details'])->name('details');
Route::get('/timtruyen',[UserController::class,'timtruyen'])->name('timtruyen');
Route::get('/timtruyen/{genre}',[UserController::class,'timtruyen'])->name('timtruyen.genre');

Route::get('/timtruyennangcao', [UserController::class, 'timtruyennangcao'])->name('timtruyennangcao');

Route::get('/history',[UserController::class,'history'])->name('history');
Route::get('/chapter/{chapterId}', [UserController::class, 'chapter'])->name('chapter.details');



//Đăng nhập
Route::get('login',[LoginController::class,'getLogin'])->name('getLogin');
Route::post('login',[LoginController::class, 'postLogin'])->name('postLogin');
//Đăng Xuất
Route::get('logout',[LoginController::class,'getLogout'])->name('getLogout');
//Đăng ký
Route::get('register',[LoginController::class, 'Register'])->name('getregister');
Route::post('register',[LoginController::class, 'postRegister'])->name('postRegister');
//Thông tin tài khoản
Route::get('/account',[LoginController::class, 'index'])->name("user.account");
Route::post('/updateinfomation/{id}',[LoginController::class, 'updateinfomation'])->name("user.updateinfomation");
//DĐổi mật khẩu
Route::post('account/{id}',[LoginController::class, 'updateAccount'])->name('user.updateAccount');



// Admin
Route::prefix('admin')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('admin.dashboard');
    
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

    //Tài khoản
    Route::get('/account', [AccountController::class, 'index'])->name('admin.account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('admin.account.create');
    Route::post('/account', [AccountController::class, 'store'])->name('admin.account.store');
    Route::get('/account/{accounts}', [AccountController::class, 'show'])->name('admin.account.show');
    Route::get('/account//{accounts}/edit', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::put('/account/{accounts}', [AccountController::class, 'update'])->name('admin.account.update');
    Route::delete('/account/{accounts}', [AccountController::class, 'destroy'])->name('admin.account.destroy');
    Route::post('/account/search', [AccountController::class, 'search'])->name('admin.account.search');

});
