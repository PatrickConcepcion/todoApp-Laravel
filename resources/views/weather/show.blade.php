@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('weather.index') }}" data-bs-toggle="tooltip" title="Back to Weather">
            <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
        </a>
        
        <div class="view-container card px-3 py-5 mx-auto mt-5 shadow">
            <h5 class="text-center fs-3">{{ $weather->date }}</h5>
            <div class="row fs-4">
                <div class="col text-end">Weather</div>
                <div class="col">{{ $weather->weather_forecast }}</div>
            </div>
            <div class="row mt-3 fs-4">
                <div class="col text-end">Chance of rain</div>
                <div class="col">{{ $weather->chance_of_rain }}</div>
            </div>
    </div>
@endsection