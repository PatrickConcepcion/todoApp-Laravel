<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/posts', 'App\Http\Controllers\PostsController');

// Route::prefix('/posts')->group(function (){
    
//     Route::get('/', [PostsController::class, 'index'])->name('posts.index');
//     Route::get('/{id}', [PostsController::class, 'show'])->name('posts.show');
//     Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
//     Route::post('/', [PostsController::class, 'store'])->name('posts.store');
//     Route::get('/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
//     Route::patch('/{id}', [PostsController::class, 'update'])->name('posts.update');
//     Route::delete('/{id}', [PostsController::class, 'destroy'])->name('posts.destroy'); 

// });

//Admin Routes

Route::get('/admin/login', [AdminController::class, 'adminlogin']);