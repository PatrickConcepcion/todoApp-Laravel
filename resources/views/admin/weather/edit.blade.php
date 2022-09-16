@extends('layouts.admin')

@section('content')

    <h5 class="text-center mt-3">Edit Weather Forecast Information</h5>
    <div class="card info-card mx-auto mt-5">
        <div class="card-body p-4">
            <a href="{{ route('admin.user.index') }}" data-bs-toggle="tooltip" title="Back to user management">
                <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
            </a>

            <form action="{{ route('admin.weatherapi.update', $weather) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="mb-1">Date</label>
                    <input class="form-control" type="date" name="date-input" value="{{ $weather->date }}">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-1">Weather Forecast</label>
                    <input class="form-control" type="text" name="weather-forecast-input" value="{{ $weather->weather_forecast }}">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-1">Change of Rain</label>
                    <input class="form-control" type="number" name="chance-of-rain-input" value="{{ $weather->chance_of_rain }}">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </form>

            {{-- {!! Form::open(['action' => ['App\Http\Controllers\Admin\WeatherForecastController@update', $weather], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('date','Date') }}
                    {{ Form::date('date', $weather->date, ['class' => 'form-control','placeholder' => 'Date']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('weather-forecast','Weather Forecast') }}
                    {{ Form::text('weather-forecast', $weather->weather_forecast, ['class' => 'form-control','placeholder' => 'Weather Forecast']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('chance-of-rain','Chance of Rain') }}
                    {{ Form::number('chance-of-rain', $weather->chance_of_rain, ['class' => 'form-control','placeholder' => 'Chance of Rain']) }}
                </div>
                <div class="text-center mt-2">
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Save Changes', ['class'=>'btn btn-primary']) }}
                </div>
            {!! Form::close() !!} --}}
        </div>
    </div>
    
@endsection