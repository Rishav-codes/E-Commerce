<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// home route
Route::get('/', [HomeController::class, 'home'])->name('home.home');
Route::get('/viewProduct/{id}', [HomeController::class, 'viewProduct'])->name('home.viewProduct');
Route::get('/viewHead/{id}', [HomeController::class, 'viewHead'])->name('home.viewHead');
Route::get('/ViewDep/{id}', [HomeController::class, 'ViewDep'])->name('home.ViewDep');
Route::match(['get','post'],'/login', [HomeController::class, 'login'])->name('login');
Route::match(['get','post'],'/signup', [HomeController::class, 'signup'])->name('signup');


Route::middleware('auth')->group(function(){
    // Route::get('/main', [HomeController::class, 'main'])->name('home.main');
    Route::match(['get','post'],'/logout', [HomeController::class, 'logout'])->name('logout');


    Route::controller(OrderController::class)->group(function(){
        Route::get('/addToCart/{id}' ,'addToCart')->name('addToCart');
        Route::get('/removeFromCart/{id}' ,'removeFromCart')->name('removeFromCart');
        Route::get('/cart' ,'cart')->name('cart');
        Route::match(['get','post'],'/checkout' ,'checkout')->name('home.checkout');
        Route::match(['get','post'],'/payment' ,'payment')->name('payment');
        Route::get('/orderDone' ,'orderDone')->name('orderDone');
        Route::get('/myorder' ,'myorder')->name('myorder');

    });
});


// admin route
Route::match(['get','post'],'/admin/login', [AdminController::class, 'login'])->name('adminlogin');
Route::get('/admin/logut', [AdminController::class, 'logout'])->name('adminlogout');

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::controller(HeadController::class)->group(function () {

            Route::match(['get', 'post'], '/manageHead', 'manageHead')->name('admin.manageHead');
            Route::get('/manageHead/delete/{id}', 'removeHead')->name('admin.removeHead');
            Route::match(['get', 'post'], '/updateHead/edit/{id}', 'updateHead')->name('admin.updateHead');
        });

        Route::controller(DepartmentController::class)->group(function () {

            Route::match(['get', 'post'], '/manageDepartment', 'manageDepartment')->name('admin.manageDepartment');
            Route::get('/manageDepartment/delete/{id}', 'removeDepartment')->name('admin.removeDepartment');
            Route::match(['get', 'post'], '/updateDepartment/edit/{id}', 'updateDepartment')->name('admin.updateDepartment');
        });

        Route::controller(ProductController::class)->group(function () {

            Route::match(['get', 'post'], '/product/index', 'index')->name('admin.product.index');
            Route::match(['get', 'post'], '/product/insert', 'insert')->name('admin.product.insert');
            Route::get('/product/delete/{id}', 'removeProduct')->name('admin.product.remove');
            Route::match(['get', 'post'], '/product/update/{id}', 'updateProduct')->name('admin.product.update');
        });
    });

    Route::controller(OrderController::class)->group(function(){
        Route::prefix("cart")->group(function(){
            Route::get('/manageCarts', 'manageCarts')->name('admin.cart.index');
        });
    });
});
