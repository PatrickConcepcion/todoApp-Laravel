<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Admin\Auth\LoginController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Route::resource('/posts', 'App\Http\Controllers\PostsController');

Route::prefix('/posts')->group(function (){
    
    Route::get('/', [PostsController::class, 'index'])->name('posts.index');
    Route::put('/', [PostsController::class, 'store'])->name('posts.store');

    Route::get('/create', [PostsController::class, 'create'])->name('posts.create');

    Route::prefix('/{post}')->group(function (){
        Route::get('/', [PostsController::class, 'show'])->name('posts.show');
        Route::get('/edit', [PostsController::class,'edit'])->name('posts.edit');
        Route::put('/', [PostsController::class, 'update'])->name('posts.update');
        Route::delete('/', [PostsController::class, 'destroy'])->name('posts.destroy');
    });
});

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
        
    //Login Routes
    Route::namespace('Auth')->group(function(){
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        // Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login',[LoginController::class, 'login']);
        Route::post('/logout','LoginController@logout')->name('logout');

        //Forgot Password Routes
    //     Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    //     Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //    Reset Password Routes
    //     Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    //     Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });
});

 