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

        $weather = WeatherForecast::get();
        return $weather;

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
        return $weather;

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
        $weather->update($request->all());

        return $weather;
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

        return response('Deleted', 204);
    }
}
