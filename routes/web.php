<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Middleware\CheckUserLogin;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('web.index');
Route::get('/about', [PageController::class, 'about'])->name('web.about');
Route::get('/contact', [PageController::class, 'contact'])->name('web.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('web.post_contact');
Route::get('/category/{id}', [PageController::class, 'productByCategory'])->name('web.category');
Route::get('/product/{id}', [PageController::class, 'productDetail'])->name('web.product_detail');

Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'Login'])->name('admin.post_login');
Route::get('/set-language/{locale}', [DashboardController::class, 'changeLanguage'])->name('change_language');

Route::prefix('admin')->middleware([CheckUserLogin::class])->name('admin.')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/list', [UserController::class, 'list'])->name('list');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/list', [CategoryController::class, 'list'])->name('list');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/list', [ProductController::class, 'list'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });

    Route::prefix('/about')->name('about.')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('/list', [AboutController::class, 'list'])->name('list');
        Route::get('/create', [AboutController::class, 'create'])->name('create');
        Route::post('/store', [AboutController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AboutController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AboutController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AboutController::class, 'delete'])->name('delete');
    });

    Route::prefix('/contact')->name('contact.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/list', [ContactController::class, 'list'])->name('list');
        Route::get('/create', [ContactController::class, 'create'])->name('create');
        Route::post('/update-status', [ContactController::class, 'updateStatus'])->name('update_status');
        Route::post('/send-mail', [ContactController::class, 'sendMail'])->name('send_mail');
        Route::get('/show/{id}', [ContactController::class, 'show'])->name('show');
        Route::put('/update/{id}', [ContactController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('delete');
    });

    Route::prefix('/slider')->name('slider.')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::get('/list', [SliderController::class, 'list'])->name('list');
        Route::get('/create', [SliderController::class, 'create'])->name('create');
        Route::post('/store', [SliderController::class, 'store'])->name('store');
        Route::get('/show/{id}', [SliderController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SliderController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('delete');
    });

    Route::prefix('/setting')->name('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/list', [SettingController::class, 'list'])->name('list');
        Route::get('/show/{id}', [SettingController::class, 'show'])->name('show');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SettingController::class, 'delete'])->name('delete');
    });
});
