<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\BoardController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\BillController;
use App\Http\Controllers\admin\ThongkeController;

use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\KitchenController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\ForgotPasswordController;
use App\Http\Controllers\user\CashierController;
// User
Route::get('/',  [LoginController::class, 'getLogin'])->name('getLogin');



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
Route::get('/accounti', [LoginController::class, 'index'])->name("user.account");
Route::post('/updateinfomation/{id}', [LoginController::class, 'updateinfomation'])->name("user.updateinfomation");

//Đổi mật khẩu
Route::post('/account/{id}', [LoginController::class, 'updateAccount'])->name('user.updateAccount');

//order
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{board_id}', [OrderController::class, 'order'])->name('order.order');
Route::get('/order/back', [OrderController::class, 'back'])->name('order.back');

Route::post('/addorder', [OrderController::class, 'addorder'])->name('order.addorder');
Route::post('/deleteorder', [OrderController::class, 'deleteorder'])->name('order.deleteorder');
Route::post('/requestpay', [OrderController::class, 'requestpay'])->name('order.requestpay');
Route::post('/order/search', [OrderController::class, 'search'])->name('order.search');

Route::get('/comics_search_keyword', [OrderController::class, 'comics_search_keyword'])->name('order.comics_search_keyword');
//bill
Route::post('/bill', [OrderController::class, 'add_bill'])->name('order.add_bill');
Route::post('/deletefood', [OrderController::class, 'deletefood'])->name('order.deletefood');


//kitchen
Route::get('/kitchen', [KitchenController::class, 'index'])->name('kitchen.index');
Route::post('/kitchen', [KitchenController::class, 'billdetail'])->name('kitchen.billdetail');
Route::post('/complte', [KitchenController::class, 'complete'])->name('kitchen.complete');
Route::post('/over', [KitchenController::class, 'over'])->name('kitchen.over');
Route::post('/still', [KitchenController::class, 'still'])->name('kitchen.still');
Route::get('/kitchen/{food_type}', [KitchenController::class, 'checktype'])->name('kitchen.checktype');
Route::post('/kitchen/search', [KitchenController::class, 'search'])->name('kitchen.search');


//cashier
Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
Route::post('/cashier', [CashierController::class, 'billdetail'])->name('cashier.billdetail');
Route::post('/pay', [CashierController::class, 'pay'])->name('cashier.pay');
Route::get('/bill/{id}/pdf', [CashierController::class, 'inbill'])->name('cashier.inbill');
Route::get('/bill/showtotal', [CashierController::class, 'showtotal'])->name('cashier.showtotal');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('admin.dashboard');

    // employee
    Route::get('/employee', [EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('admin.employee.store');
    Route::get('/employee/{user}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
    Route::put('/employee/{user}', [EmployeeController::class, 'update'])->name('admin.employee.update');
    Route::delete('/employee/{user}', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');
    Route::post('/employee/search', [EmployeeController::class, 'search'])->name('admin.employee.search');

    // board
    Route::get('/board', [BoardController::class, 'index'])->name('admin.board.index');
    Route::get('/board/create', [BoardController::class, 'create'])->name('admin.board.create');
    Route::post('/board', [BoardController::class, 'store'])->name('admin.board.store');
    Route::get('/board/{user}/edit', [BoardController::class, 'edit'])->name('admin.board.edit');
    Route::put('/board/{user}', [BoardController::class, 'update'])->name('admin.board.update');
    Route::delete('/board/{board}', [BoardController::class, 'destroy'])->name('admin.board.destroy');


    // food
    Route::get('/food', [FoodController::class, 'index'])->name('admin.food.index');
    Route::get('/food/create', [FoodController::class, 'create'])->name('admin.food.create');
    Route::post('/food', [FoodController::class, 'store'])->name('admin.food.store');
    Route::get('/food/{food}/edit', [FoodController::class, 'edit'])->name('admin.food.edit');
    Route::put('/food/{food}', [FoodController::class, 'update'])->name('admin.food.update');
    Route::delete('/food/{food}', [FoodController::class, 'destroy'])->name('admin.food.destroy');
    Route::post('/food/type', [FoodController::class, 'checktype'])->name('admin.food.checktype');
    Route::post('/food/search', [FoodController::class, 'search'])->name('admin.food.search');

    //Tài khoản
    Route::get('/account', [AccountController::class, 'index'])->name('admin.account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('admin.account.create');
    Route::post('/account', [AccountController::class, 'store'])->name('admin.account.store');
    Route::get('/account/{accounts}', [AccountController::class, 'show'])->name('admin.account.show');
    Route::get('/account//{accounts}/edit', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::put('/account/{accounts}', [AccountController::class, 'update'])->name('admin.account.update');
    Route::delete('/account/{accounts}', [AccountController::class, 'destroy'])->name('admin.account.destroy');
    Route::post('/account/search', [AccountController::class, 'search'])->name('admin.account.search');

    //Hóa đơn
    Route::get('/bill', [BillController::class, 'index'])->name('admin.bill.index');

    //thống kê
    Route::get('/thongke', [ThongkeController::class, 'index'])->name('admin.thongke.index');
});
