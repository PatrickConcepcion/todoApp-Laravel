@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/posts">
            <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
        </a>
         
        <h3 class="text-center">Edit Todo</h3>

        <div class="edit-container mx-auto">
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('title','Title') }}
                    {{ Form::text('title', $post->todoTitle, ['class' => 'form-control todo-input','placeholder' => 'Title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body','Body') }}
                    {{ Form::textarea('body', $post->todoBody, ['class' => 'form-control todo-input','placeholder' => 'Body']) }}
                </div>
                <div class="text-center mt-2">
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Save Changes', ['class'=>'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>

    </div>
@endsection