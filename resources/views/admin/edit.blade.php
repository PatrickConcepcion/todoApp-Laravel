@extends('layouts.admin')

@section('content')
    <h5 class="text-center mt-3">Edit User</h5>
    <div class="card info-card mx-auto mt-5">
        <div class="card-body p-4">
            <a href="{{ route('admin.user.index') }}" data-bs-toggle="tooltip" title="Back to user management">
                <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
            </a>

            {!! Form::open(['action' => ['App\Http\Controllers\Admin\UserController@update', $user], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('name','Name') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control todo-input','placeholder' => 'Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email','Email') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control todo-input','placeholder' => 'Email']) }}
                </div>
                <div class="text-center mt-2">
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Save Changes', ['class'=>'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection