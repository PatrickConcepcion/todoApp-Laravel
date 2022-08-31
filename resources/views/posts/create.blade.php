@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/posts">
            <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
        </a>
         
        <h3 class="text-center">Create Todo</h3>

        <div class="create-container mx-auto">
            {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('title','Title') }}
                    {{ Form::text('title', '', ['class' => 'form-control todo-input','placeholder' => 'Title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body','Body') }}
                    {{ Form::textarea('body', '', ['class' => 'form-control todo-input','placeholder' => 'Body']) }}
                </div>
                <div class="text-center mt-2">
                    {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>

    </div>
@endsection