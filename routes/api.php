<?php

use App\Http\Controllers\Admin\WeatherForecastController;
use App\Models\WeatherForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


index
store
show
update
destroy

*/

Route::group(['prefix' => 'api/weather'], function(){
    
    Route::get('/', [WeatherForecastController::class, 'index']);
    Route::post('/', [WeatherForecastController::class, 'store']);

    Route::group(['prefix' => '{weather}'], function(){
        Route::get('/', [WeatherForecastController::class, 'show']);
        Route::put('/', [WeatherForecastController::class, 'update']);
        Route::delete('/', [WeatherForecastController::class, 'destroy']);
    });

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
