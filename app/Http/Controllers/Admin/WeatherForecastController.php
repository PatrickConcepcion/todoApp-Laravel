<?php

namespace App\Http\Controllers\Admin;

use App\Models\WeatherForecast;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWeatherForecastRequest;
use App\Http\Requests\UpdateWeatherForecastRequest;

class WeatherForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $weatherInfo = WeatherForecast::get();

        return view('admin.weather.index')->with(compact(['weatherInfo']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWeatherForecastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeatherForecastRequest $request)
    {
        $weatherInfo = WeatherForecast::create($request->all());
        return $weatherInfo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WeatherForecast  $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function show(WeatherForecast $weather)
    {
        return view('admin.weather.show')->with(compact(['weather']));

    }

    public function edit(WeatherForecast $weather)
    {
        return view('admin.weather.edit')->with(compact(['weather']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeatherForecastRequest  $request
     * @param  \App\Models\WeatherForecast  $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeatherForecastRequest $request, WeatherForecast $weather)
    {
        // $weather->update($request->all());
        $weather->date = $request->input('date-input');
        $weather->weather_forecast = $request->input('weather-forecast-input');
        $weather->chance_of_rain = $request->input('chance-of-rain-input');
        $weather->save();

        return redirect()->route('admin.weatherapi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeatherForecast  $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeatherForecast $weather)
    {
        $weather->delete();

        return redirect()->route('admin.weatherapi.index');
    }
}
