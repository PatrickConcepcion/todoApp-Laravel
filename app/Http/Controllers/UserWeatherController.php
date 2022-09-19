<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherForecast;


class UserWeatherController extends Controller
{
    public function index(){
        $weatherInfo = WeatherForecast::orderBy('date', 'desc')
            ->get();

        return view('weather.index')->with(compact(['weatherInfo']));
    }

    public function show(WeatherForecast $weather){
        return view('weather.show')->with(compact(['weather']));
    }
}
