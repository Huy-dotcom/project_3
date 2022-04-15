<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\user\ProductDetailController;
use App\Http\Controllers\user\ShoppageController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Middleware\CheckUserLoginMiddleware;
use App\Http\Middleware\CheckUserNotLoginMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Admin
Route::namespace('Admin')->prefix('ad')->group(function () {
    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin.form.login');
    });
    // Login, logout
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.form.login');
    Route::post('/login', 'LoginController@login')->name('admin.handle.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.handle.logout');

    Route::group(['middleware' => 'check.admin.login'], function() {
        // Dashboard
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('filter-order', 'DashboardController@fillterOrder')->name('filter.order');
        // Category
        Route::group(['prefix'=>'category'],function(){
            Route::get('list','CategoryController@index')->name('category.list');

            Route::get('edit/{id}','CategoryController@edit')->name('category.edit.form');

            Route::post('edit/{id}','CategoryController@update')->name('category.edit');

            Route::get('add','CategoryController@create')->name('category.add.form');

            Route::post('add','CategoryController@store')->name('category.add');

            Route::get('delete/{id}','CategoryController@destroy')->name('category.delete');
        });
        // Brand
        Route::group(['prefix'=>'brand'],function(){
            Route::get('list','BrandController@index')->name('brand.list');

            Route::get('edit/{id}','BrandController@edit')->name('brand.edit.form');

            Route::post('edit/{id}','BrandController@update')->name('brand.edit');

            Route::get('add','BrandController@create')->name('brand.add.form');

            Route::post('add','BrandController@store')->name('brand.add');

            Route::get('delete/{id}','BrandController@destroy')->name('brand.delete');
        });
        // Supplier
        Route::group(['prefix'=>'supplier'],function(){
            Route::get('list','SupplierController@index')->name('supplier.list');

            Route::get('edit/{id}','SupplierController@edit')->name('supplier.edit.form');

            Route::post('edit/{id}','SupplierController@update')->name('supplier.edit');

            Route::get('add','SupplierController@create')->name('supplier.add.form');

            Route::post('add','SupplierController@store')->name('supplier.add');

            Route::get('delete/{id}','SupplierController@destroy')->name('supplier.delete');
        });
        // Product
        Route::group(['prefix'=>'product'],function(){
            Route::get('list','ProductController@index')->name('product.list');

            Route::get('edit/{id}','ProductController@edit')->name('product.edit.form');

            Route::post('edit/{id}','ProductController@update')->name('product.edit');

            Route::get('add','ProductController@create')->name('product.add.form');

            Route::post('add','ProductController@store')->name('product.add');

            Route::get('delete/{id}','ProductController@destroy')->name('product.delete');

            Route::get('show/{id}','ProductController@show')->name('product.show');

            Route::get('update-status/{id}/{status}','ProductController@updateStatus')->name('product.update.status');
        });
        // User
        Route::group(['prefix'=>'user'],function(){
            Route::get('list','UserController@index')->name('customer.list');

            Route::get('edit/{id}','UserController@edit')->name('customer.edit.form');

            Route::post('edit/{id}','UserController@update')->name('customer.edit');

            Route::get('delete/{id}','UserController@destroy')->name('customer.delete');
        });
        // Staff
        Route::group(['prefix'=>'staff', 'middleware' => 'check.role'],function(){
            Route::get('list','StaffController@index')->name('staff.list');

            Route::get('edit/{id}','StaffController@edit')->name('staff.edit.form');

            Route::post('edit/{id}','StaffController@update')->name('staff.edit');

            Route::get('add','StaffController@create')->name('staff.add.form');

            Route::post('add','StaffController@store')->name('staff.add');

            Route::get('delete/{id}','StaffController@destroy')->name('staff.delete');
        });
        // Order
        Route::group(['prefix'=>'order'],function(){
            Route::get('list','OrderController@index')->name('order.list');

            Route::get('show/{id}','OrderController@show')->name('order.show');

            Route::post('edit/{id}','OrderController@update')->name('order.edit');
        });
    });
});

// user
Route::middleware([CheckUserLoginMiddleware::class])->group(function(){
    Route::get('/user/login',[AuthController::class, 'login'])->name('user_login');
    Route::post('/user/loginprocess',[AuthController::class, 'loginProcess'])->name('login_process');

});

Route::get('/',[HomepageController::class, 'index'])->name('homepage');

Route::get('/shop',[ShoppageController::class, 'index'])->name('shoppage');

Route::get('/user/signup',[AuthController::class, 'signUp'])->name('user_sign_up');

Route::post('user/signupprocess',[AuthController::class, 'signUpProcess'])->name('sign_up_process');

Route::get('/detail/{id}',[ProductDetailController::class, 'index'])->name('product_detail');

Route::get('/cart',[CartController::class, 'index'])->name('cart');

Route::get('/addToCart',[CartController::class, 'addToCart'])->name('add_to_cart');

Route::get('/deleteCartItem/{id}',[CartController::class, 'delete_cart_item'])->name('delete_cart_item');

Route::get('updateCart',[CartController::class, 'update_cart_item'])->name('update_cart');

Route::middleware([CheckUserNotLoginMiddleware::class])->group(function(){
    Route::get('ckeckout',[CheckoutController::class, 'index'])->name('checkout');
    Route::get('ckeckout-process',[CheckoutController::class, 'checkoutProcess'])->name('checkout_process');
    Route::get('logout',[AuthController::class, 'logout_Process'])->name('user_logout');
});
