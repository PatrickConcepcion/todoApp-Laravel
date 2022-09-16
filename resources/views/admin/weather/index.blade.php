@extends('layouts.admin')

@section('content')

    <div class="container">

        <h3 class="text-center mt-2">Weather Updates</h3>

    <a class="btn btn-primary mt-2 mb-4" href="">
        <i class='bx bx-plus'> </i><span> Create Weather Update</span>
    </a>

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
                                <a href="{{ route('admin.weatherapi.show', $weather) }}" class="stretched-link"></a>
                            </div>
                            
                            <div class="card-control mt-4 d-flex justify-content-center">
                                <a class="btn btn-primary me-1" href="{{ route('admin.weatherapi.edit', $weather) }}">Edit</a>
                                <form action="{{ route('admin.weatherapi.destroy', $weather) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
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