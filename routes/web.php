<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\ComicController;
use App\Http\Controllers\admin\ChapterController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\ForgotPasswordController;

// User
Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/details/{comicId}', [UserController::class, 'details'])->name('details');
Route::get('/comics_search', [UserController::class, 'comics_search'])->name('comics_search');

Route::get('/foundcomic/{genreId}/{status}/{filter}', [UserController::class, 'foundcomic'])->name('foundcomic');

Route::get('/comics_search/{genre}', [UserController::class, 'comics_search'])->name('comics_search.genre');
Route::get('/comics_search_keyword', [UserController::class, 'comics_search_keyword'])->name('comics_search_keyword');
Route::get('/advanced_comics_search', [UserController::class, 'advanced_comics_search'])->name('advanced_comics_search');
Route::get('/history', [UserController::class, 'history'])->name('history');
Route::get('/chapter/{chapterId}', [UserController::class, 'chapter'])->name('chapter.details');

//Theo dõi
Route::get('/follow', [UserController::class, 'follow'])->name('follow');
Route::post('/loadfollow', [UserController::class, 'loadfollow'])->name('loadfollow');
Route::post('/theodoi',[UserController::class,'theodoi'])->name('theodoi');
Route::post('/botheodoi', [UserController::class, 'botheodoi'])->name('botheodoi');
Route::post('/check', [UserController::class, 'check'])->name('check');
//Route::post('/count',[UserController::class,'followcount'])->name('count');
Route::post('/list',[UserController::class,'followlist'])->name('list');
Route::get('/gett/{comicId}', [UserController::class, 'getcomic'])->name('getcomic');
Route::get('/list/{userId}', [UserController::class, 'f_list'])->name('f_list');


//Đăng nhập, đăng kí, xác thực otp
Route::get('/login', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [RegisterController::class, 'Register'])->name('getregister');
Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/send-otp', [RegisterController::class, 'sendOtp'])->name('sendOtp');

Route::post('/forgot-password', [ForgotPasswordController::class, 'postForgotPassword'])->name('postForgotPassword');
Route::post('/reset-password', [ForgotPasswordController::class, 'postResetPassword'])->name('postResetPassword');


//Đăng Xuất
Route::get('/logout', [LoginController::class, 'getLogout'])->name('getLogout');

//Thông tin tài khoản
Route::get('/account', [LoginController::class, 'index'])->name("user.account");
Route::post('/updateinfomation/{id}', [LoginController::class, 'updateinfomation'])->name("user.updateinfomation");

//Đổi mật khẩu
Route::post('/account/{id}', [LoginController::class, 'updateAccount'])->name('user.updateAccount');

//Bình Luận
Route::post('/commtent', [UserController::class, 'postComment'])->name('postComment');
Route::post('/loadcommtent', [UserController::class, 'loadComment'])->name('loadComment');
Route::post('/loadNumbercomment', [UserController::class, 'loadNumbercomment'])->name('loadNumbercomment');
Route::post('/commentreply', [UserController::class, 'postCommentReply'])->name('postCommentReply');
Route::post('/commentreplyuser', [UserController::class, 'postCmtReplyuser'])->name('postCmtReplyuser');

//View
Route::post('/view', [UserController::class, 'postView'])->name('postView');
//Lich su
Route::post('/history', [UserController::class, 'postHistory'])->name('postHistory');
Route::post('/destroyhistory', [UserController::class, 'destroyHistory'])->name('destroyHistory');
Route::post('/loadhistory', [UserController::class, 'loadHistory'])->name('loadHistory');
//check
Route::post('/checkchapter', [UserController::class, 'checkchapter'])->name('checkchapter');
//mo chap
Route::post('/openchapter', [UserController::class, 'openchapter'])->name("openchapter");
//
Route::post('/coin', [UserController::class, 'loadcoin'])->name("loadcoin");
//thanh toan 
Route::post('/payment/{id}', [UserController::class, 'payment'])->name("payment");



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

    //Bình luận
    Route::get('/comment', [CommentController::class, 'index'])->name('admin.comment.index');
    Route::get('/comment/{comic}', [CommentController::class, 'showChapter'])->name('admin.comment.showChapter');
    Route::get('/comment/{comic}/{chapter}', [CommentController::class, 'show'])->name('admin.comment.show');
    Route::get('/commentreply/{comic}/{chapter}/{comment}', [CommentController::class, 'showcmtreply'])->name('admin.comment.showcmtreply');
    Route::delete('/comment/{comic}/{chapter}/{comment}', [CommentController::class, 'destroy'])->name('admin.comment.destroy');
    Route::delete('/comment/{comic}/{chapter}/{comment}/{commentreply}', [CommentController::class, 'destroyreply'])->name('admin.comment.destroyreply');

    //Đơn hàng
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::post('/order/search', [OrderController::class, 'search'])->name('admin.order.search');
});
