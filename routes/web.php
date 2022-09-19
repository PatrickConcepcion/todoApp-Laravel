<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Middleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WeatherForecastController;
use App\Http\Controllers\UserWeatherController;
use App\Models\WeatherForecast;

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

// Landing page routes


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/about', [PublicController::class, 'about'])->name('about');

Auth::routes();

// Authenticated User Routes 

Route::group(['middleware' => ['auth']], function(){

    Route::group(['prefix' => '/posts'], function(){

        Route::get('/', [PostsController::class, 'index'])->name('posts.index');
        Route::put('/', [PostsController::class, 'store'])->name('posts.store');
        Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
        
        Route::group(['prefix' => '/{post}', 'as' => 'posts.'], function(){

            Route::get('/', [PostsController::class, 'show'])->name('show');
            Route::get('/edit', [PostsController::class,'edit'])->name('edit');
            Route::put('/', [PostsController::class, 'update'])->name('update');
            Route::delete('/', [PostsController::class, 'destroy'])->name('destroy');

        });

    });

    // Route for weather 

    Route::group(['prefix' => '/weather', 'as' => 'weather.'], function(){

        Route::get('/', [UserWeatherController::class, 'index'])->name('index');
        Route::get('/{weather}', [UserWeatherController::class, 'show'])->name('show');

    });

});

//Admin Routes

Route::prefix('/admin')->name('admin.')->group(function(){

    //Login Routes
    Route::namespace('Auth')->group(function(){

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',[LoginController::class, 'login']);

        Route::group(['middleware' => ['auth.custom']], function(){

            Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('home');
            Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
    
            //User management

            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

                Route::get('/', [UserController::class, 'index'])->name('index');
    
                Route::prefix('/{user}')->group(function (){

                    Route::get('/', [UserController::class, 'show'])->name('show');
                    Route::put('/', [UserController::class, 'update'])->name('update');
                    Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
                    Route::get('/edit', [UserController::class, 'edit'])->name('edit');

                });

            });
            
            // Routes for the Weather 

            Route::group(['prefix' => '/weather', 'as' => 'weatherapi.'], function(){

                Route::get('/', [WeatherForecastController::class, 'index'])->name('index');
                Route::put('/', [WeatherForecastController::class, 'store'])->name('store');
                Route::get('/create', [WeatherForecastController::class, 'create'])->name('create');

                Route::group(['prefix' => '/{weather}'], function(){

                    Route::get('/', [WeatherForecastController::class, 'show'])->name('show');
                    Route::put('/', [WeatherForecastController::class, 'update'])->name('update');
                    Route::delete('/', [WeatherForecastController::class, 'destroy'])->name('destroy');
                    Route::get('/edit', [WeatherForecastController::class, 'edit'])->name('edit');

                });

            });

        });
        
    });

});

