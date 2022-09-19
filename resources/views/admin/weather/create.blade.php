@extends('layouts.admin')

@section('content')

    <h5 class="text-center mt-3">Create Weather Forecast</h5>
    <div class="card info-card mx-auto mt-5">
        <div class="card-body p-4">
            <a href="{{ route('admin.user.index') }}" data-bs-toggle="tooltip" title="Back to user management">
                <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
            </a>

            <form action="{{ route('admin.weatherapi.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="mb-1">Date</label>
                    <input class="form-control" type="date" name="date">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-1">Weather Forecast</label>
                    <input class="form-control" type="text" name="weather_forecast">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-1">Change of Rain</label>
                    <input class="form-control" type="number" name="chance_of_rain">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Create Forecast</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection