@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 class="text-center mt-2">Weather Updates</h3>

    <div class="row weather-cards">

        @if (count($weatherInfo) > 0)
            @foreach ($weatherInfo as $weather)
                <div class="col my-1 mx-auto p-3">
                    <div class="weather-card card mx-auto shadow-sm p-3" data-bs-toggle="tooltip" title="Click to view">
                        <div class="card-body">
                            <div class="card-upper">
                                <div class="row">
                                    <div class="col text-center mb-3 fs-4">{{ $weather->date }}</div>
                                </div>
                                <div class="row">
                                    <div class="col text-end">Weather</div>
                                    <div class="col">{{ $weather->weather_forecast }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col text-end">Chance of rain</div>
                                    <div class="col">{{ $weather->chance_of_rain }}</div>
                                </div>
                                <a href="{{ route('weather.show', $weather) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">There are no weather updates yet</p>
        @endif

    </div>

    </div>
    
@endsection

{{-- @section('scripts') --}}
{{--  --}}
{{-- @endsection --}}